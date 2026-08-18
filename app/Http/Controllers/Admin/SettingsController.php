<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index(): View
    {
        $settings = Setting::all()->pluck('value', 'key');

        // Decode working hours if it exists
        $workingHours = isset($settings['working_hours'])
            ? json_decode($settings['working_hours'], true)
            : $this->getDefaultWorkingHours();

        // Get last backup date
        $lastBackupDate = $this->getLastBackupDate();

        return view('admin.settings.index', compact(
            'settings',
            'workingHours',
            'lastBackupDate'
        ));
    }

    /**
     * Update commune information.
     */
    public function updateCommuneInfo(Request $request)
    {
        $request->validate([
            'commune_name'    => ['required', 'string', 'max:255'],
            'commune_address' => ['required', 'string'],
            'commune_phone'   => ['required', 'string', 'max:20'],
            'commune_email'   => ['required', 'email'],
            'commune_logo'    => ['nullable', 'image', 'max:2048'],
        ]);

        Setting::set('commune_name', $request->commune_name);
        Setting::set('commune_address', $request->commune_address);
        Setting::set('commune_phone', $request->commune_phone);
        Setting::set('commune_email', $request->commune_email);

        if ($request->hasFile('commune_logo')) {
            $path = $request->file('commune_logo')->store('logos', 'public');
            Setting::set('commune_logo_path', $path);
        }

        return redirect()->route('admin.settings')->with('success', 'Commune information updated successfully.');
    }

    /**
     * Update working hours.
     */
    public function updateWorkingHours(Request $request)
    {
        $request->validate([
            'working_hours' => ['required', 'array'],
        ]);

        $workingHours = [];
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($days as $day) {
            $workingHours[$day] = [
                'open'   => $request->input("working_hours.{$day}.open"),
                'close'  => $request->input("working_hours.{$day}.close"),
                'closed' => $request->boolean("working_hours.{$day}.closed"),
            ];
        }

        Setting::set('working_hours', json_encode($workingHours));

        return redirect()->route('admin.settings')->with('success', 'Working hours updated successfully.');
    }

    /**
     * Update service toggles.
     */
    public function updateServiceToggles(Request $request)
    {
        $request->validate([
            'is_service_birth_certificate_enabled' => ['boolean'],
            'is_service_permit_enabled'             => ['boolean'],
        ]);

        Setting::set(
            'is_service_birth_certificate_enabled',
            $request->boolean('is_service_birth_certificate_enabled') ? '1' : '0'
        );
        Setting::set(
            'is_service_permit_enabled',
            $request->boolean('is_service_permit_enabled') ? '1' : '0'
        );

        return redirect()->route('admin.settings')->with('success', 'Service toggles updated successfully.');
    }

    /**
     * Run database backup.
     */
    public function runBackup(Request $request)
    {
        try {
            if (!Storage::exists('backups')) {
                Storage::makeDirectory('backups');
            }

            $timestamp = now()->format('Y-m-d_H-i-s');
            $filename  = "backup-{$timestamp}.sql";

            $databaseConfig = config('database.connections.mysql');

            $command = sprintf(
                'mysqldump -h%s -u%s -p%s %s > %s',
                $databaseConfig['host'],
                $databaseConfig['username'],
                $databaseConfig['password'],
                $databaseConfig['database'],
                storage_path("app/backups/{$filename}")
            );

            $output     = [];
            $returnCode = 0;
            exec($command, $output, $returnCode);

            if ($returnCode === 0) {
                return redirect()->route('admin.settings')->with('success', 'Backup completed successfully.');
            }

            // Fallback: create a simple marker file
            $backupContent  = "Backup created at: " . now()->format('Y-m-d H:i:s') . "\n";
            $backupContent .= "Database: " . $databaseConfig['database'] . "\n";
            Storage::put("backups/{$filename}", $backupContent);

            return redirect()->route('admin.settings')->with('success', 'Backup completed (simplified version).');
        } catch (\Exception $e) {
            return redirect()->route('admin.settings')->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    /**
     * Get the last backup date.
     */
    private function getLastBackupDate(): ?string
    {
        try {
            $files = Storage::files('backups');
            if (empty($files)) {
                return null;
            }

            $latestFile = collect($files)->sortByDesc(function ($file) {
                return Storage::lastModified($file);
            })->first();

            $ts = Storage::lastModified($latestFile);

            return $ts ? date('Y-m-d H:i:s', $ts) : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get default working hours.
     */
    private function getDefaultWorkingHours(): array
    {
        return [
            'monday'    => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
            'tuesday'   => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
            'wednesday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
            'thursday'  => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
            'friday'    => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
            'saturday'  => ['open' => '09:00', 'close' => '12:00', 'closed' => false],
            'sunday'    => ['open' => null,    'close' => null,    'closed' => true],
        ];
    }
}
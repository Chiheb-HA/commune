<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $defaults = [
            'commune_name' => 'My Commune',
            'commune_address' => null,
            'commune_phone' => null,
            'commune_email' => null,
            'commune_logo_path' => null,
            'working_hours' => json_encode([]),
            'is_service_birth_certificate_enabled' => '1',
            'is_service_permit_enabled' => '1',
            'smtp_test_recipient' => null,
        ];

        foreach ($defaults as $k => $v) {
            Setting::updateOrCreate(['key' => $k], ['value' => $v]);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSettings = [
            'commune_name' => 'Municipality Portal',
            'commune_address' => '123 Main Street, City, Country',
            'commune_phone' => '+1234567890',
            'commune_email' => 'contact@commune.gov',
            'commune_logo_path' => null,
            'working_hours' => json_encode([
                'monday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
                'tuesday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
                'wednesday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
                'thursday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
                'friday' => ['open' => '09:00', 'close' => '17:00', 'closed' => false],
                'saturday' => ['open' => '09:00', 'close' => '12:00', 'closed' => false],
                'sunday' => ['open' => null, 'close' => null, 'closed' => true],
            ]),
            'is_service_birth_certificate_enabled' => '1',
            'is_service_permit_enabled' => '1',
            'smtp_test_recipient' => 'admin@commune.gov',
        ];

        foreach ($defaultSettings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Administrator
        $admin = User::firstOrCreate(
            ['cin' => '00000001'],
            [
                'name' => 'Admin User',
                'email' => 'admin@commune.local',
                'cin' => '00000001',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('admin');

        // Editor
        $editor = User::firstOrCreate(
            ['cin' => '00000002'],
            [
                'name' => 'Jane Editor',
                'email' => 'editor@commune.local',
                'cin' => '00000002',
                'password' => Hash::make('password'),
            ]
        );
        $editor->assignRole('editor');

        // Official
        $official = User::firstOrCreate(
            ['cin' => '00000003'],
            [
                'name' => 'Bob Official',
                'email' => 'official@commune.local',
                'cin' => '00000003',
                'password' => Hash::make('password'),
            ]
        );
        $official->assignRole('official');

        // Citizen
        $citizen = User::firstOrCreate(
            ['cin' => '00000004'],
            [
                'name' => 'John Citizen',
                'email' => 'citizen@commune.local',
                'cin' => '00000004',
                'password' => Hash::make('password'),
            ]
        );
        $citizen->assignRole('citizen');

        // Additional test citizens
        for ($i = 5; $i <= 9; $i++) {
            User::firstOrCreate(
                ['cin' => str_pad($i, 8, '0', STR_PAD_LEFT)],
                [
                    'name' => "Citizen " . ($i - 4),
                    'email' => "citizen" . ($i - 4) . "@commune.local",
                    'cin' => str_pad($i, 8, '0', STR_PAD_LEFT),
                    'password' => Hash::make('password'),
                ]
            )->assignRole('citizen');
        }
    }
}

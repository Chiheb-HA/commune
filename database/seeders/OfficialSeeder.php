<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Official;
use App\Models\User;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    public function run(): void
    {
        // Get departments
        $urbanPlanning = Department::where('slug', 'urban-planning')->first();
        $technicalServices = Department::where('slug', 'technical-services')->first();
        $socialServices = Department::where('slug', 'social-services')->first();
        $finance = Department::where('slug', 'finance-department')->first();

        // Create users for officials if they don't exist
        $official1 = User::firstOrCreate(
            ['cin' => '00000010'],
            [
                'name' => 'Ahmed Ben Ali',
                'email' => 'ahmed.benali@commune.local',
                'cin' => '00000010',
                'password' => bcrypt('password'),
            ]
        );

        $official2 = User::firstOrCreate(
            ['cin' => '00000011'],
            [
                'name' => 'Sarah Martinez',
                'email' => 'sarah.martinez@commune.local',
                'cin' => '00000011',
                'password' => bcrypt('password'),
            ]
        );

        $official3 = User::firstOrCreate(
            ['cin' => '00000012'],
            [
                'name' => 'Mohammed Al-Hassan',
                'email' => 'mohammed.alhassan@commune.local',
                'cin' => '00000012',
                'password' => bcrypt('password'),
            ]
        );

        $official4 = User::firstOrCreate(
            ['cin' => '00000013'],
            [
                'name' => 'Fatima Zahra',
                'email' => 'fatima.zahra@commune.local',
                'cin' => '00000013',
                'password' => bcrypt('password'),
            ]
        );

        $officials = [
            [
                'user_id' => '00000010',
                'department_id' => $urbanPlanning->id ?? 1,
                'position_fr' => 'Chef de Service',
                'position_en' => 'Service Head',
                'position_ar' => 'رئيس الخدمة',
                'phone' => '+1234567895',
                'email' => 'ahmed.benali@commune.local',
                'office_location' => 'City Hall',
                'office_number' => '101',
                'bio_fr' => 'Responsable du service urbanisme avec 10 ans d\'expérience',
                'bio_en' => 'Head of urban planning service with 10 years of experience',
                'bio_ar' => 'رئيس خدمة التخطيط العمراني بخبرة 10 سنوات',
                'status' => 'active',
            ],
            [
                'user_id' => '00000011',
                'department_id' => $technicalServices->id ?? 2,
                'position_fr' => 'Ingénieur en Chef',
                'position_en' => 'Chief Engineer',
                'position_ar' => 'المهندس الرئيسي',
                'phone' => '+1234567896',
                'email' => 'sarah.martinez@commune.local',
                'office_location' => 'City Hall',
                'office_number' => '102',
                'bio_fr' => 'Ingénieur en chef responsable des infrastructures',
                'bio_en' => 'Chief engineer responsible for infrastructure',
                'bio_ar' => 'المهندس الرئيسي المسؤول عن البنية التحتية',
                'status' => 'active',
            ],
            [
                'user_id' => '00000012',
                'department_id' => $socialServices->id ?? 3,
                'position_fr' => 'Assistant Social',
                'position_en' => 'Social Worker',
                'position_ar' => 'الاجتماعي',
                'phone' => '+1234567897',
                'email' => 'mohammed.alhassan@commune.local',
                'office_location' => 'Community Center',
                'office_number' => '201',
                'bio_fr' => 'Assistant social dédié à l\'aide aux citoyens',
                'bio_en' => 'Social worker dedicated to citizen assistance',
                'bio_ar' => 'أخصائي اجتماعي مكرس لمساعدة المواطنين',
                'status' => 'active',
            ],
            [
                'user_id' => '00000013',
                'department_id' => $finance->id ?? 4,
                'position_fr' => 'Comptable',
                'position_en' => 'Accountant',
                'position_ar' => 'محاسب',
                'phone' => '+1234567898',
                'email' => 'fatima.zahra@commune.local',
                'office_location' => 'City Hall',
                'office_number' => '202',
                'bio_fr' => 'Comptable responsable de la gestion financière',
                'bio_en' => 'Accountant responsible for financial management',
                'bio_ar' => 'محاسب مسؤول عن الإدارة المالية',
                'status' => 'active',
            ],
        ];

        foreach ($officials as $official) {
            Official::firstOrCreate(
                [
                    'user_id' => $official['user_id'],
                    'department_id' => $official['department_id'],
                ],
                $official
            );
        }
    }
}

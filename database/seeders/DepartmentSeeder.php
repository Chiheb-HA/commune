<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name_fr' => 'Service Urbanisme',
                'name_en' => 'Urban Planning Department',
                'name_ar' => 'إدارة التخطيط العمراني',
                'slug' => 'ادارة-التخطيط-العمراني',
                'description_fr' => 'Gestion de l\'urbanisme et des permis de construire',
                'description_en' => 'Management of urban planning and building permits',
                'description_ar' => 'إدارة التخطيط العمراني وتراخيص البناء',
                'phone' => '+1234567890',
                'email' => 'urbanisme@commune.local',
                'location' => 'City Hall, 1st Floor',
                'building_number' => '1',
                'floor' => '1',
                'head_id' => '00000003', // Bob Official
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name_fr' => 'Service Technique',
                'name_en' => 'Technical Services',
                'name_ar' => 'الخدمات الفنية',
                'slug' => 'الخدمات-الفنية',
                'description_fr' => 'Maintenance des infrastructures et équipements municipaux',
                'description_en' => 'Maintenance of municipal infrastructure and equipment',
                'description_ar' => 'صيانة البنية التحتية والمعدات البلدية',
                'phone' => '+1234567891',
                'email' => 'technique@commune.local',
                'location' => 'City Hall, Ground Floor',
                'building_number' => '1',
                'floor' => '0',
                'head_id' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name_fr' => 'Service Social',
                'name_en' => 'Social Services',
                'name_ar' => 'الخدمات الاجتماعية',
                'slug' => 'الخدمات-الاجتماعية',
                'description_fr' => 'Aide sociale et soutien aux citoyens',
                'description_en' => 'Social assistance and citizen support',
                'description_ar' => 'المساعدة الاجتماعية ودعم المواطنين',
                'phone' => '+1234567892',
                'email' => 'social@commune.local',
                'location' => 'Community Center, 2nd Floor',
                'building_number' => '2',
                'floor' => '2',
                'head_id' => null,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name_fr' => 'Service Financier',
                'name_en' => 'Finance Department',
                'name_ar' => 'إدارة الشؤون المالية',
                'slug' => 'ادارة-الشؤون-المالية',
                'description_fr' => 'Gestion financière et budget municipal',
                'description_en' => 'Financial management and municipal budget',
                'description_ar' => 'الإدارة المالية وميزانية البلدية',
                'phone' => '+1234567893',
                'email' => 'finance@commune.local',
                'location' => 'City Hall, 2nd Floor',
                'building_number' => '1',
                'floor' => '2',
                'head_id' => null,
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($departments as $department) {
            Department::firstOrCreate(
                ['slug' => $department['slug']],
                $department
            );
        }
    }
}

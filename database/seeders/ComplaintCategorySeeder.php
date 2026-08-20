<?php

namespace Database\Seeders;

use App\Models\ComplaintCategory;
use Illuminate\Database\Seeder;

class ComplaintCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_fr' => 'Infrastructure',
                'name_en' => 'Infrastructure',
                'name_ar' => 'البنية التحتية',
                'description_fr' => 'Problèmes liés aux infrastructures municipales',
                'description_en' => 'Issues related to municipal infrastructure',
                'description_ar' => 'مشاكل تتعلق بالبنية التحتية البلدية',
                'slug' => 'infrastructure',
                'order' => 1,
            ],
            [
                'name_fr' => 'Services Publics',
                'name_en' => 'Public Services',
                'name_ar' => 'الخدمات العامة',
                'description_fr' => 'Problèmes liés aux services publics',
                'description_en' => 'Issues related to public services',
                'description_ar' => 'مشاكل تتعلق بالخدمات العامة',
                'slug' => 'services',
                'order' => 2,
            ],
            [
                'name_fr' => 'Personnel',
                'name_en' => 'Staff',
                'name_ar' => 'الموظفين',
                'description_fr' => 'Problèmes liés au personnel municipal',
                'description_en' => 'Issues related to municipal staff',
                'description_ar' => 'مشاكل تتعلق بالموظفين البلديين',
                'slug' => 'staff',
                'order' => 3,
            ],
            [
                'name_fr' => 'Propreté',
                'name_en' => 'Cleanliness',
                'name_ar' => 'النظافة',
                'description_fr' => 'Problèmes liés à la propreté et aux déchets',
                'description_en' => 'Issues related to cleanliness and waste',
                'description_ar' => 'مشاكل تتعلق بالنظافة والنفايات',
                'slug' => 'cleanliness',
                'order' => 4,
            ],
            [
                'name_fr' => 'Sécurité',
                'name_en' => 'Security',
                'name_ar' => 'الأمن',
                'description_fr' => 'Problèmes liés à la sécurité publique',
                'description_en' => 'Issues related to public security',
                'description_ar' => 'مشاكل تتعلق بالأمن العام',
                'slug' => 'security',
                'order' => 5,
            ],
            [
                'name_fr' => 'Autre',
                'name_en' => 'Other',
                'name_ar' => 'أخرى',
                'description_fr' => 'Autres types de plaintes',
                'description_en' => 'Other types of complaints',
                'description_ar' => 'أنواع أخرى من الشكاوى',
                'slug' => 'other',
                'order' => 6,
            ],
        ];

        // Delete all existing categories first to avoid duplicates
        ComplaintCategory::query()->delete();

        foreach ($categories as $category) {
            ComplaintCategory::create($category);
        }
    }
}

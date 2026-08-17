<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_fr' => 'Infrastructure',
                'name_en' => 'Infrastructure',
                'name_ar' => 'البنية التحتية',
                'description_fr' => 'Articles sur les projets d\'infrastructure municipale',
                'description_en' => 'Articles about municipal infrastructure projects',
                'description_ar' => 'مقالات عن مشاريع البنية التحتية البلدية',
            ],
            [
                'name_fr' => 'Services Publics',
                'name_en' => 'Public Services',
                'name_ar' => 'الخدمات العامة',
                'description_fr' => 'Informations sur les services publics municipaux',
                'description_en' => 'Information about municipal public services',
                'description_ar' => 'معلومات عن الخدمات العامة البلدية',
            ],
            [
                'name_fr' => 'Environnement',
                'name_en' => 'Environment',
                'name_ar' => 'البيئة',
                'description_fr' => 'Initiatives et projets environnementaux',
                'description_en' => 'Environmental initiatives and projects',
                'description_ar' => 'المبادرات والمشاريع البيئية',
            ],
            [
                'name_fr' => 'Culture',
                'name_en' => 'Culture',
                'name_ar' => 'الثقافة',
                'description_fr' => 'Événements culturels et artistiques',
                'description_en' => 'Cultural and artistic events',
                'description_ar' => 'الأحداث الثقافية والفنية',
            ],
            [
                'name_fr' => 'Sports',
                'name_en' => 'Sports',
                'name_ar' => 'الرياضة',
                'description_fr' => 'Activités sportives et installations',
                'description_en' => 'Sports activities and facilities',
                'description_ar' => 'الأنشطة الرياضية والمرافق',
            ],
            [
                'name_fr' => 'Éducation',
                'name_en' => 'Education',
                'name_ar' => 'التعليم',
                'description_fr' => 'Programmes éducatifs et écoles',
                'description_en' => 'Educational programs and schools',
                'description_ar' => 'البرامج التعليمية والمدارس',
            ],
            [
                'name_fr' => 'Santé',
                'name_en' => 'Health',
                'name_ar' => 'الصحة',
                'description_fr' => 'Services de santé et initiatives de bien-être',
                'description_en' => 'Health services and wellness initiatives',
                'description_ar' => 'خدمات الصحة ومبادرات العافية',
            ],
            [
                'name_fr' => 'Transport',
                'name_en' => 'Transportation',
                'name_ar' => 'النقل',
                'description_fr' => 'Réseaux de transport public et routes',
                'description_en' => 'Public transport networks and roads',
                'description_ar' => 'شبكات النقل العام والطرق',
            ],
        ];

        foreach ($categories as $category) {
            $category['slug'] = \Illuminate\Support\Str::slug($category['name_en']);
            Category::firstOrCreate(
                ['name_en' => $category['name_en']],
                $category
            );
        }
    }
}

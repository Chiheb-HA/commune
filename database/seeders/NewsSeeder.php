<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@commune.local')->first();
        $editor = User::where('email', 'editor@commune.local')->first();

        $newsItems = [
            [
                'title_fr' => 'Inauguration du Nouveau Parc Municipal',
                'title_en' => 'Inauguration of the New Municipal Park',
                'title_ar' => 'افتتاح الحديقة البلدية الجديدة',
                'content_fr' => 'La municipalité est fière d\'annoncer l\'inauguration du nouveau parc municipal. Ce projet d\'une valeur de 2 millions d\'euros offre aux citoyens un espace vert moderne avec des aires de jeux pour enfants, des pistes de jogging et des zones de pique-nique.',
                'content_en' => 'The municipality is proud to announce the inauguration of the new municipal park. This €2 million project provides citizens with a modern green space featuring children\'s playgrounds, jogging tracks, and picnic areas.',
                'content_ar' => 'تفتخر البلدية بالإعلان عن افتتاح الحديقة البلدية الجديدة. هذا المشروع بقيمة مليوني يورو يوفر للمواطنين مساحة خضراء حديثة تتمثل في ملاعب للأطفال ومسارات للجري ومناطق للتنزه.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'created_by' => $editor?->cin,
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Nouveau Service de Collecte des Déchets',
                'title_en' => 'New Waste Collection Service',
                'title_ar' => 'خدمة جديدة لجمع القمامة',
                'content_fr' => 'À partir du mois prochain, la municipalité mettra en place un nouveau système de collecte des déchets plus écologique. Les camions électriques remplaceront progressivement la flotte actuelle.',
                'content_en' => 'Starting next month, the municipality will implement a new, more eco-friendly waste collection system. Electric trucks will gradually replace the current fleet.',
                'content_ar' => 'بدءا من الشهر المقبل، ستقوم البلدية بتطبيق نظام جديد أكثر صداقة للبيئة لجمع النفايات. ستستبدل الشاحانات الكهربائية تدريجيا الأسطول الحالي.',
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'created_by' => $editor?->cin,
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Journée Portes Ouvertes à la Mairie',
                'title_en' => 'Open House at City Hall',
                'title_ar' => 'يوم الأبواب المفتوحة في البلدية',
                'content_fr' => 'La mairie organise une journée portes ouvertes le samedi 15 juillet. Venez découvrir les services municipaux, rencontrer les élus et participer aux ateliers interactifs.',
                'content_en' => 'City Hall is organizing an open house on Saturday, July 15th. Come discover municipal services, meet elected officials, and participate in interactive workshops.',
                'content_ar' => 'تنظم البلدية يوما للأبواب المفتوحة يوم السبت 15 يوليو. تعال لاكتشاف الخدمات البلدية والقاء المسؤولين المنتخبين والمشاركة في ورش العمل التفاعلية.',
                'status' => 'published',
                'published_at' => now()->subDays(15),
                'created_by' => $admin?->cin,
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Subventions pour les Entreprises Locales',
                'title_en' => 'Grants for Local Businesses',
                'title_ar' => 'منح للشركات المحلية',
                'content_fr' => 'Un nouveau programme de subventions est lancé pour soutenir les entreprises locales. Les entreprises éligibles peuvent recevoir jusqu\'à 10 000€ pour développer leurs activités.',
                'content_en' => 'A new grant program has been launched to support local businesses. Eligible businesses can receive up to €10,000 to develop their activities.',
                'content_ar' => 'تم إطلاق برنامج جديد للمنح لدعم الشركات المحلية. يمكن للشركات المؤهلة الحصول على ما يصل إلى 10000 يورو لتطوير أنشطتها.',
                'status' => 'published',
                'published_at' => now()->subDays(20),
                'created_by' => $admin?->cin,
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Rénovation du Centre-Ville',
                'title_en' => 'Downtown Renovation',
                'title_ar' => 'تجديد وسط المدينة',
                'content_fr' => 'Les travaux de rénovation du centre-ville commenceront le mois prochain. Le projet comprend la réfection des routes, l\'installation de nouveaux éclairages et la création d\'espaces piétons.',
                'content_en' => 'Downtown renovation work will begin next month. The project includes road resurfacing, installation of new lighting, and creation of pedestrian spaces.',
                'content_ar' => 'ستبدأ أعمال تجديد وسط المدينة الشهر المقبل. يشمل المشروع إعادة إصلاح الطرق وتركيب إضاءة جديدة وإنشاء مسارات للمشاة.',
                'status' => 'published',
                'published_at' => now()->subDays(25),
                'created_by' => $editor?->cin,
                'views' => rand(100, 500),
            ],
        ];

        foreach ($newsItems as $news) {
            $news['slug'] = \Illuminate\Support\Str::slug($news['title_en']);
            News::firstOrCreate(
                ['slug' => $news['slug']],
                $news
            );
        }
    }
}

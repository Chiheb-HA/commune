<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@commune.local')->first();
        $editor = User::where('email', 'editor@commune.local')->first();
        
        $infrastructureCategory = Category::where('name_en', 'Infrastructure')->first();
        $environmentCategory = Category::where('name_en', 'Environment')->first();
        $cultureCategory = Category::where('name_en', 'Culture')->first();

        $articles = [
            [
                'title_fr' => 'Le Projet de Rénovation du Quartier Historique',
                'title_en' => 'Historic District Renovation Project',
                'title_ar' => 'مشروع تجديد الحي التاريخي',
                'content_fr' => 'La municipalité a lancé un projet ambitieux de rénovation du quartier historique. Ce projet vise à préserver le patrimoine architectural tout en modernisant les infrastructures. Les travaux incluront la rénovation des façades, l\'amélioration de l\'éclairage public et la création d\'espaces piétons.',
                'content_en' => 'The municipality has launched an ambitious renovation project for the historic district. This project aims to preserve architectural heritage while modernizing infrastructure. Works will include facade renovation, public lighting improvement, and creation of pedestrian spaces.',
                'content_ar' => 'أطلقت البلدية مشروعا طموحا لتجديد الحي التاريخي. يهدف هذا المشروع إلى الحفاظ على التراث المعماري مع تحديث البنية التحتية. ستشمل الأعمال تجديد الواجهات وتحسين الإضاءة العامة وإنشاء مسارات للمشاة.',
                'slug' => Str::slug('Historic District Renovation Project'),
                'status' => 'published',
                'category_id' => $infrastructureCategory?->id,
                'created_by' => $editor?->cin,
                'published_at' => now()->subDays(7),
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Initiative Verte: Plantation de 1000 Arbres',
                'title_en' => 'Green Initiative: Planting 1000 Trees',
                'title_ar' => 'مبادرة خضراء: زراعة 1000 شجرة',
                'content_fr' => 'Dans le cadre de notre engagement envers l\'environnement, la municipalité s\'engage à planter 1000 arbres cette année. Cette initiative contribuera à améliorer la qualité de l\'air, réduire les îlots de chaleur urbaine et embellir notre ville.',
                'content_en' => 'As part of our commitment to the environment, the municipality pledges to plant 1000 trees this year. This initiative will help improve air quality, reduce urban heat islands, and beautify our city.',
                'content_ar' => 'ضمن التزامنا بالبيئة، تتعهد البلدية بزراعة 1000 شجرة هذا العام. ستساهم هذه المبادرة في تحسين جودة الهواء وتقليل الجزر الحرارية الحضرية وتجميل مدينتنا.',
                'slug' => Str::slug('Green Initiative Planting 1000 Trees'),
                'status' => 'published',
                'category_id' => $environmentCategory?->id,
                'created_by' => $admin?->cin,
                'published_at' => now()->subDays(14),
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Nouveau Centre Culturel Ouvert au Public',
                'title_en' => 'New Cultural Center Open to Public',
                'title_ar' => 'مركز ثقافي جديد مفتوح للجمهور',
                'content_fr' => 'Le nouveau centre culturel est désormais ouvert au public. Ce espace moderne propose des ateliers d\'art, des expositions, des concerts et des conférences. L\'inscription aux activités est gratuite pour les résidents.',
                'content_en' => 'The new cultural center is now open to the public. This modern space offers art workshops, exhibitions, concerts, and conferences. Registration for activities is free for residents.',
                'content_ar' => 'المركز الثقافي الجديد مفتوح الآن للجمهور. يقدم هذا الفضاء الحديث ورش عمل فنية ومعارض وحفلات ومحاضرات. التسجيل في الأنشطة مجاني للسكان.',
                'slug' => Str::slug('New Cultural Center Open to Public'),
                'status' => 'published',
                'category_id' => $cultureCategory?->id,
                'created_by' => $editor?->cin,
                'published_at' => now()->subDays(21),
                'views' => rand(100, 500),
            ],
            [
                'title_fr' => 'Modernisation du Système de Transport Public',
                'title_en' => 'Modernization of Public Transport System',
                'title_ar' => 'تحديث نظام النقل العام',
                'content_fr' => 'La municipalité investit dans la modernisation de son système de transport public. Nouveaux bus électriques, stations intelligentes et application mobile pour suivre les bus en temps réel.',
                'content_en' => 'The municipality is investing in modernizing its public transport system. New electric buses, smart stations, and a mobile app to track buses in real-time.',
                'content_ar' => 'تستثمر البلدية في تحديث نظام النقل العام. حافلات كهربائية جديدة ومحطات ذكية وتطبيق جوال لتتبع الحافلات في الوقت الفعلي.',
                'slug' => Str::slug('Modernization of Public Transport System'),
                'status' => 'published',
                'category_id' => $infrastructureCategory?->id,
                'created_by' => $admin?->cin,
                'published_at' => now()->subDays(28),
                'views' => rand(100, 500),
            ],
        ];

        foreach ($articles as $article) {
            Article::firstOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}

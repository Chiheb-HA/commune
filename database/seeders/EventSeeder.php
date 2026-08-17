<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@commune.local')->first();
        $editor = User::where('email', 'editor@commune.local')->first();

        $events = [
            [
                'title_fr' => 'Festival de Musique Municipal',
                'title_en' => 'Municipal Music Festival',
                'title_ar' => 'مهرجان الموسيقى البلدي',
                'description_fr' => 'Rejoignez-nous pour le festival de musique annuel avec des artistes locaux et internationaux. Entrée gratuite pour tous.',
                'description_en' => 'Join us for the annual music festival featuring local and international artists. Free admission for everyone.',
                'description_ar' => 'انضم إلينا في مهرجان الموسيقى السنوي مع فنانين محليين ودوليين. دخول مجاني للجميع.',
                'start_date' => now()->addDays(15),
                'end_date' => now()->addDays(17),
                'location_fr' => 'Parc Central',
                'location_en' => 'Central Park',
                'location_ar' => 'السنترال بارك',
                'capacity' => 5000,
                'status' => 'published',
                'created_by' => $editor?->cin,
            ],
            [
                'title_fr' => 'Marché des Fermiers',
                'title_en' => 'Farmers Market',
                'title_ar' => 'سوق المزارعين',
                'description_fr' => 'Marché hebdomadaire des produits frais locaux. Légumes, fruits, fromages et pains artisanaux.',
                'description_en' => 'Weekly market of fresh local products. Vegetables, fruits, cheeses, and artisanal breads.',
                'description_ar' => 'سوق أسبوعي للمنتجات الطازجة المحلية. خضروات وفواكه وأجبان وخبز artisanal.',
                'start_date' => now()->addDay(),
                'end_date' => now()->addDay(),
                'location_fr' => 'Place de la Ville',
                'location_en' => 'Town Square',
                'location_ar' => 'ساحة المدينة',
                'capacity' => 500,
                'status' => 'published',
                'created_by' => $editor?->cin,
            ],
            [
                'title_fr' => 'Conférence sur le Développement Durable',
                'title_en' => 'Sustainable Development Conference',
                'title_ar' => 'مؤتمر التنمية المستدامة',
                'description_fr' => 'Conférence sur les pratiques de développement durable pour les municipalités. Experts et décideurs partageront leurs expériences.',
                'description_en' => 'Conference on sustainable development practices for municipalities. Experts and decision-makers will share their experiences.',
                'description_ar' => 'مؤتمر حول ممارسات التنمية المستدامة للبلديات. سيشارك الخبراء وصناع القرار تجاربهم.',
                'start_date' => now()->addDays(30),
                'end_date' => now()->addDays(30),
                'location_fr' => 'Centre de Conférences',
                'location_en' => 'Conference Center',
                'location_ar' => 'مركز المؤتمرات',
                'capacity' => 200,
                'status' => 'published',
                'created_by' => $admin?->cin,
            ],
            [
                'title_fr' => 'Course de Charité',
                'title_en' => 'Charity Run',
                'title_ar' => 'سباق الخير',
                'description_fr' => 'Course de 5km pour soutenir les œuvres caritatives locales. Tous les fonds collectés iront aux banques alimentaires.',
                'description_en' => '5km run to support local charities. All funds raised will go to food banks.',
                'description_ar' => 'سباق 5 كم لدعم الجمعيات الخيرية المحلية. سذهب جميع الأموال المجمعة إلى بنوك الطعام.',
                'start_date' => now()->addDays(45),
                'end_date' => now()->addDays(45),
                'location_fr' => 'Parc de la Ville',
                'location_en' => 'City Park',
                'location_ar' => 'حديقة المدينة',
                'capacity' => 1000,
                'status' => 'published',
                'created_by' => $admin?->cin,
            ],
        ];

        foreach ($events as $event) {
            $event['slug'] = \Illuminate\Support\Str::slug($event['title_en']);
            Event::firstOrCreate(
                ['slug' => $event['slug']],
                $event
            );
        }
    }
}

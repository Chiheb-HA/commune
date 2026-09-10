<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $creatorId = User::query()->value('cin');

        $galleries = [
            [
                'title_fr' => 'Majel Bel Abbès en images',
                'title_en' => 'Majel Bel Abbes in Pictures',
                'title_ar' => 'ماجل بلعباس في صور',
                'slug' => 'majel-bel-abbes-en-images',
                'description_fr' => 'Découvrir la commune, ses quartiers et ses paysages.',
                'description_en' => 'Discover the commune, its neighborhoods, and landscapes.',
                'description_ar' => 'اكتشف البلدية وأحياءها ومشاهدها الطبيعية.',
                'created_by' => $creatorId,
                'status' => 'published',
                'images' => [
                    ['url' => 'galleries/majel-rue-centrale.jpg', 'title_fr' => 'Rue centrale', 'title_en' => 'Main street', 'title_ar' => 'الشارع الرئيسي'],
                    ['url' => 'galleries/majel-place.jpg', 'title_fr' => 'Place municipale', 'title_en' => 'Municipal square', 'title_ar' => 'الساحة البلدية'],
                    ['url' => 'galleries/majel-countryside.jpg', 'title_fr' => 'Paysage de Kasserine', 'title_en' => 'Kasserine landscape', 'title_ar' => 'مشهد من القصرين'],
                ],
            ],
            [
                'title_fr' => 'Vie municipale',
                'title_en' => 'Municipal Life',
                'title_ar' => 'الحياة البلدية',
                'slug' => 'vie-municipale',
                'description_fr' => 'Activités, réunions et services au bénéfice des citoyens.',
                'description_en' => 'Activities, meetings, and services for citizens.',
                'description_ar' => 'أنشطة واجتماعات وخدمات لفائدة المواطنين.',
                'created_by' => $creatorId,
                'status' => 'published',
                'images' => [
                    ['url' => 'galleries/conseil-municipal.jpg', 'title_fr' => 'Conseil municipal', 'title_en' => 'Municipal council', 'title_ar' => 'المجلس البلدي'],
                    ['url' => 'galleries/atelier-citoyen.jpg', 'title_fr' => 'Atelier citoyen', 'title_en' => 'Citizen workshop', 'title_ar' => 'ورشة مواطنية'],
                    ['url' => 'galleries/equipe-technique.jpg', 'title_fr' => 'Équipe technique', 'title_en' => 'Technical team', 'title_ar' => 'الفريق الفني'],
                    ['url' => 'galleries/entretien-ville.jpg', 'title_fr' => 'Entretien de la ville', 'title_en' => 'Town maintenance', 'title_ar' => 'صيانة المدينة'],
                ],
            ],
            [
                'title_fr' => 'Patrimoine et environnement',
                'title_en' => 'Heritage and Environment',
                'title_ar' => 'التراث والبيئة',
                'slug' => 'patrimoine-et-environnement',
                'description_fr' => 'Le patrimoine local et les actions pour un environnement durable.',
                'description_en' => 'Local heritage and action for a sustainable environment.',
                'description_ar' => 'التراث المحلي والعمل من أجل بيئة مستدامة.',
                'created_by' => $creatorId,
                'status' => 'published',
                'images' => [
                    ['url' => 'galleries/patrimoine-local.jpg', 'title_fr' => 'Patrimoine local', 'title_en' => 'Local heritage', 'title_ar' => 'التراث المحلي'],
                    ['url' => 'galleries/plantation-arbres.jpg', 'title_fr' => 'Plantation d’arbres', 'title_en' => 'Tree planting', 'title_ar' => 'غراسة الأشجار'],
                    ['url' => 'galleries/nettoyage-quartier.jpg', 'title_fr' => 'Action de propreté', 'title_en' => 'Cleanliness action', 'title_ar' => 'حملة نظافة'],
                ],
            ],
        ];

        foreach ($galleries as $galleryData) {
            $images = $galleryData['images'];
            unset($galleryData['images']);
            $gallery = Gallery::firstOrCreate(['slug' => $galleryData['slug']], $galleryData);

            foreach ($images as $order => $image) {
                GalleryImage::firstOrCreate(
                    ['gallery_id' => $gallery->id, 'image_url' => $image['url']],
                    [
                        'thumbnail_url' => $image['url'],
                        'title_fr' => $image['title_fr'],
                        'title_en' => $image['title_en'],
                        'title_ar' => $image['title_ar'],
                        'caption_fr' => $image['title_fr'],
                        'caption_en' => $image['title_en'],
                        'caption_ar' => $image['title_ar'],
                        'order' => $order + 1,
                    ]
                );
            }
        }
    }
}

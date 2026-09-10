<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = [
            ['title_fr' => 'Concours de propreté des quartiers', 'title_en' => 'Neighborhood Cleanliness Competition', 'title_ar' => 'مسابقة نظافة الأحياء', 'description_fr' => 'Concours citoyen pour valoriser les quartiers les plus propres.', 'description_en' => 'Citizen competition recognizing the cleanest neighborhoods.', 'description_ar' => 'مسابقة مواطنية لتكريم أنظف الأحياء.', 'start_date' => '2026-09-01', 'end_date' => '2026-10-15', 'status' => 'open', 'attachment_path' => 'competitions/proprete-quartiers.pdf', 'is_active' => true, 'order' => 1],
            ['title_fr' => 'Concours de l’initiative citoyenne', 'title_en' => 'Citizen Initiative Competition', 'title_ar' => 'مسابقة المبادرة المواطنة', 'description_fr' => 'Récompenser les projets locaux au service de la communauté.', 'description_en' => 'Rewarding local projects serving the community.', 'description_ar' => 'تكريم المشاريع المحلية لفائدة المجتمع.', 'start_date' => '2026-09-10', 'end_date' => '2026-11-20', 'status' => 'open', 'attachment_path' => null, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Concours de décoration du mois de Ramadan', 'title_en' => 'Ramadan Decoration Competition', 'title_ar' => 'مسابقة تزيين شهر رمضان', 'description_fr' => 'Concours des meilleures décorations des espaces publics.', 'description_en' => 'Competition for the best public-space decorations.', 'description_ar' => 'مسابقة لأجمل تزيين للفضاءات العمومية.', 'start_date' => '2025-02-20', 'end_date' => '2025-03-20', 'status' => 'closed', 'attachment_path' => 'competitions/ramadan-2025.pdf', 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Concours scolaire pour l’environnement', 'title_en' => 'School Environment Competition', 'title_ar' => 'مسابقة مدرسية حول البيئة', 'description_fr' => 'Sensibiliser les élèves à la protection de l’environnement local.', 'description_en' => 'Raise pupils’ awareness of protecting the local environment.', 'description_ar' => 'تحسيس التلاميذ بأهمية حماية البيئة المحلية.', 'start_date' => '2025-03-01', 'end_date' => '2025-05-31', 'status' => 'closed', 'attachment_path' => null, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Concours de photographie du patrimoine', 'title_en' => 'Heritage Photography Competition', 'title_ar' => 'مسابقة تصوير التراث', 'description_fr' => 'Mettre en valeur les paysages et le patrimoine de Majel Bel Abbès.', 'description_en' => 'Highlight the landscapes and heritage of Majel Bel Abbes.', 'description_ar' => 'التعريف بمشاهد وتراث ماجل بلعباس.', 'start_date' => '2027-01-15', 'end_date' => '2027-03-15', 'status' => 'upcoming', 'attachment_path' => null, 'is_active' => true, 'order' => 5],
            ['title_fr' => 'Concours des jardins familiaux', 'title_en' => 'Family Gardens Competition', 'title_ar' => 'مسابقة الحدائق العائلية', 'description_fr' => 'Encourager les espaces verts et les pratiques écologiques.', 'description_en' => 'Encourage green spaces and ecological practices.', 'description_ar' => 'تشجيع المساحات الخضراء والممارسات البيئية.', 'start_date' => '2027-04-01', 'end_date' => '2027-06-30', 'status' => 'upcoming', 'attachment_path' => 'competitions/jardins-familiaux.pdf', 'is_active' => true, 'order' => 6],
        ];

        foreach ($competitions as $competition) {
            $competition['slug'] = Str::slug($competition['title_fr']);
            Competition::firstOrCreate(['slug' => $competition['slug']], $competition);
        }
    }
}

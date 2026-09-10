<?php

namespace Database\Seeders;

use App\Models\GovernancePublication;
use Illuminate\Database\Seeder;

class GovernancePublicationSeeder extends Seeder
{
    public function run(): void
    {
        $publications = [
            ['title_fr' => 'Programme participatif 2026', 'title_en' => 'Participatory Programme 2026', 'title_ar' => 'البرنامج التشاركي لسنة 2026', 'description_fr' => 'Priorités proposées avec les habitants pour les investissements locaux.', 'description_en' => 'Priorities proposed with residents for local investment.', 'description_ar' => 'أولويات مقترحة مع المواطنين للاستثمارات المحلية.', 'type' => 'programme_participatif', 'publication_date' => '2026-01-20', 'attachment_path' => 'governance/programme-participatif-2026.pdf', 'is_active' => true, 'order' => 1],
            ['title_fr' => 'Programme participatif - compte rendu des ateliers', 'title_en' => 'Participatory Programme - Workshop Report', 'title_ar' => 'البرنامج التشاركي - تقرير الورشات', 'description_fr' => 'Synthèse des rencontres organisées dans les quartiers.', 'description_en' => 'Summary of meetings held in the neighborhoods.', 'description_ar' => 'خلاصة اللقاءات المنظمة بالأحياء.', 'type' => 'programme_participatif', 'publication_date' => '2026-03-12', 'attachment_path' => null, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Consultation publique sur le plan de circulation', 'title_en' => 'Public Consultation on Traffic Plan', 'title_ar' => 'استشارة عمومية حول مخطط المرور', 'description_fr' => 'Documents et observations concernant l’organisation de la circulation.', 'description_en' => 'Documents and feedback concerning traffic organization.', 'description_ar' => 'وثائق وملاحظات حول تنظيم حركة المرور.', 'type' => 'consultation_publique', 'publication_date' => '2026-04-08', 'attachment_path' => 'governance/consultation-circulation.pdf', 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Consultation publique sur les espaces verts', 'title_en' => 'Public Consultation on Green Spaces', 'title_ar' => 'استشارة عمومية حول المساحات الخضراء', 'description_fr' => 'Appel aux avis des habitants sur l’aménagement des espaces verts.', 'description_en' => 'Residents are invited to comment on green-space planning.', 'description_ar' => 'دعوة المواطنين لإبداء الرأي حول تهيئة المساحات الخضراء.', 'type' => 'consultation_publique', 'publication_date' => '2026-05-16', 'attachment_path' => null, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Plan annuel d’investissement communal', 'title_en' => 'Annual Municipal Investment Plan', 'title_ar' => 'المخطط السنوي للاستثمار البلدي', 'description_fr' => 'Présentation des investissements programmés pour la commune.', 'description_en' => 'Overview of planned municipal investments.', 'description_ar' => 'عرض للاستثمارات المبرمجة لفائدة البلدية.', 'type' => 'pai', 'publication_date' => '2025-12-22', 'attachment_path' => 'governance/pai-2026.pdf', 'is_active' => true, 'order' => 5],
            ['title_fr' => 'Plan d’investissement communal révisé', 'title_en' => 'Revised Municipal Investment Plan', 'title_ar' => 'المخطط البلدي للاستثمار المحيّن', 'description_fr' => 'Version révisée des opérations d’investissement.', 'description_en' => 'Revised version of investment operations.', 'description_ar' => 'النسخة المحيّنة من عمليات الاستثمار.', 'type' => 'pai', 'publication_date' => '2026-06-03', 'attachment_path' => null, 'is_active' => true, 'order' => 6],
            ['title_fr' => 'Programme d’investissement communal 2025', 'title_en' => 'Municipal Investment Programme 2025', 'title_ar' => 'برنامج الاستثمار البلدي لسنة 2025', 'description_fr' => 'Bilan des opérations réalisées et en cours.', 'description_en' => 'Review of completed and ongoing operations.', 'description_ar' => 'حصيلة العمليات المنجزة والجارية.', 'type' => 'pic', 'publication_date' => '2025-10-09', 'attachment_path' => 'governance/pic-2025.pdf', 'is_active' => true, 'order' => 7],
            ['title_fr' => 'Programme d’investissement communal 2026', 'title_en' => 'Municipal Investment Programme 2026', 'title_ar' => 'برنامج الاستثمار البلدي لسنة 2026', 'description_fr' => 'Opérations prioritaires pour les quartiers et équipements publics.', 'description_en' => 'Priority operations for neighborhoods and public facilities.', 'description_ar' => 'العمليات ذات الأولوية للأحياء والتجهيزات العمومية.', 'type' => 'pic', 'publication_date' => '2026-02-05', 'attachment_path' => null, 'is_active' => true, 'order' => 8],
            ['title_fr' => 'Plan de gestion environnementale et sociale', 'title_en' => 'Environmental and Social Management Plan', 'title_ar' => 'مخطط التصرف البيئي والاجتماعي', 'description_fr' => 'Mesures environnementales et sociales pour les projets municipaux.', 'description_en' => 'Environmental and social measures for municipal projects.', 'description_ar' => 'إجراءات بيئية واجتماعية للمشاريع البلدية.', 'type' => 'pges', 'publication_date' => '2026-07-14', 'attachment_path' => 'governance/pges-2026.pdf', 'is_active' => true, 'order' => 9],
            ['title_fr' => 'Mise à jour du PGES des travaux de voirie', 'title_en' => 'Roadworks ESMP Update', 'title_ar' => 'تحيين المخطط البيئي لأشغال الطرقات', 'description_fr' => 'Mesures de suivi environnemental pour les travaux de voirie.', 'description_en' => 'Environmental monitoring measures for roadworks.', 'description_ar' => 'إجراءات المتابعة البيئية لأشغال الطرقات.', 'type' => 'pges', 'publication_date' => '2026-08-18', 'attachment_path' => null, 'is_active' => true, 'order' => 10],
        ];

        foreach ($publications as $publication) {
            GovernancePublication::firstOrCreate(['title_fr' => $publication['title_fr']], $publication);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProcurementNotice;
use Illuminate\Database\Seeder;

class ProcurementNoticeSeeder extends Seeder
{
    public function run(): void
    {
        $notices = [
            ['title_fr' => 'PAM - Fourniture de matériel d’entretien', 'title_en' => 'PAM - Maintenance Equipment Supply', 'title_ar' => 'طلب عروض مبسط - اقتناء معدات صيانة', 'description_fr' => 'Avis pour la fourniture de matériel destiné aux équipes municipales.', 'description_en' => 'Notice for supplying equipment to municipal teams.', 'description_ar' => 'إعلان لاقتناء معدات لفائدة الفرق البلدية.', 'type' => 'pam', 'reference_number' => 'PAM-2026-01', 'publication_date' => '2026-01-15', 'deadline_date' => '2026-02-10', 'attachment_path' => 'procurement/pam-materiel-entretien.pdf', 'is_active' => true, 'order' => 1],
            ['title_fr' => 'PAM - Travaux de peinture des bâtiments municipaux', 'title_en' => 'PAM - Painting of Municipal Buildings', 'title_ar' => 'طلب عروض مبسط - صبغ المباني البلدية', 'description_fr' => 'Consultation pour des travaux de peinture et de remise en état.', 'description_en' => 'Consultation for painting and refurbishment works.', 'description_ar' => 'استشارة لأشغال الصبغ وإعادة التهيئة.', 'type' => 'pam', 'reference_number' => 'PAM-2026-02', 'publication_date' => '2026-03-04', 'deadline_date' => null, 'attachment_path' => null, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Appel d’offres pour l’éclairage public', 'title_en' => 'Public Lighting Tender', 'title_ar' => 'طلب عروض للإنارة العمومية', 'description_fr' => 'Réalisation et extension du réseau d’éclairage des quartiers.', 'description_en' => 'Construction and extension of neighborhood lighting networks.', 'description_ar' => 'إنجاز وتوسعة شبكة الإنارة بالأحياء.', 'type' => 'appel_offres', 'reference_number' => 'AO-2026-03', 'publication_date' => '2026-04-12', 'deadline_date' => '2026-05-20', 'attachment_path' => 'procurement/ao-eclairage.pdf', 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Appel d’offres pour la voirie communale', 'title_en' => 'Municipal Roads Tender', 'title_ar' => 'طلب عروض للطرقات البلدية', 'description_fr' => 'Travaux de réfection de plusieurs voies à Majel Bel Abbès.', 'description_en' => 'Rehabilitation works on several roads in Majel Bel Abbes.', 'description_ar' => 'أشغال إصلاح عدد من الطرقات بماجل بلعباس.', 'type' => 'appel_offres', 'reference_number' => 'AO-2026-04', 'publication_date' => '2026-06-01', 'deadline_date' => null, 'attachment_path' => null, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Résultat de désignation - Nettoyage des espaces publics', 'title_en' => 'Designation Result - Public Space Cleaning', 'title_ar' => 'نتيجة التعيين - تنظيف الفضاءات العمومية', 'description_fr' => 'Résultat de la procédure de désignation du prestataire.', 'description_en' => 'Result of the service provider designation procedure.', 'description_ar' => 'نتيجة إجراء تعيين مزود الخدمة.', 'type' => 'resultat_designation', 'reference_number' => 'RD-2025-11', 'publication_date' => '2025-11-18', 'deadline_date' => null, 'attachment_path' => 'procurement/resultat-nettoyage.pdf', 'is_active' => true, 'order' => 5],
            ['title_fr' => 'Résultat de désignation - Maintenance informatique', 'title_en' => 'Designation Result - IT Maintenance', 'title_ar' => 'نتيجة التعيين - صيانة الإعلامية', 'description_fr' => 'Publication du résultat de la consultation informatique.', 'description_en' => 'Publication of the IT consultation result.', 'description_ar' => 'نشر نتيجة الاستشارة المتعلقة بالإعلامية.', 'type' => 'resultat_designation', 'reference_number' => 'RD-2026-05', 'publication_date' => '2026-07-09', 'deadline_date' => null, 'attachment_path' => null, 'is_active' => true, 'order' => 6],
            ['title_fr' => 'PAM - Acquisition de bacs à déchets', 'title_en' => 'PAM - Purchase of Waste Bins', 'title_ar' => 'طلب عروض مبسط - اقتناء حاويات فضلات', 'description_fr' => 'Acquisition de bacs pour renforcer la propreté urbaine.', 'description_en' => 'Purchase of bins to strengthen urban cleanliness.', 'description_ar' => 'اقتناء حاويات لدعم النظافة الحضرية.', 'type' => 'pam', 'reference_number' => 'PAM-2026-07', 'publication_date' => '2026-08-02', 'deadline_date' => '2026-08-28', 'attachment_path' => 'procurement/pam-bacs.pdf', 'is_active' => true, 'order' => 7],
            ['title_fr' => 'Appel d’offres pour l’aménagement du marché', 'title_en' => 'Market Improvement Tender', 'title_ar' => 'طلب عروض لتهيئة السوق البلدي', 'description_fr' => 'Études et travaux d’amélioration du marché municipal.', 'description_en' => 'Studies and improvement works for the municipal market.', 'description_ar' => 'دراسات وأشغال لتحسين السوق البلدي.', 'type' => 'appel_offres', 'reference_number' => 'AO-2026-08', 'publication_date' => '2026-08-20', 'deadline_date' => '2026-10-01', 'attachment_path' => 'procurement/ao-marche.pdf', 'is_active' => true, 'order' => 8],
        ];

        foreach ($notices as $notice) {
            ProcurementNotice::firstOrCreate(['reference_number' => $notice['reference_number']], $notice);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\FundingSource;
use Illuminate\Database\Seeder;

class FundingSourceSeeder extends Seeder
{
    public function run(): void
    {
        $sources = [
            ['title_fr' => 'Dotation générale de l’État 2024', 'title_en' => '2024 General State Allocation', 'title_ar' => 'المنحة العامة للدولة لسنة 2024', 'description_fr' => 'Dotation destinée au fonctionnement général de la commune.', 'description_en' => 'Allocation for the commune’s general operation.', 'description_ar' => 'منحة مخصصة للتسيير العام للبلدية.', 'type' => 'dotation_non_affectee', 'amount' => 1850000.00, 'fiscal_year' => 2024, 'is_active' => true, 'order' => 1],
            ['title_fr' => 'Dotation générale de l’État 2025', 'title_en' => '2025 General State Allocation', 'title_ar' => 'المنحة العامة للدولة لسنة 2025', 'description_fr' => 'Dotation de fonctionnement pour les services municipaux.', 'description_en' => 'Operating allocation for municipal services.', 'description_ar' => 'منحة تسيير للمصالح البلدية.', 'type' => 'dotation_non_affectee', 'amount' => 1925000.00, 'fiscal_year' => 2025, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Dotation affectée à l’éclairage public', 'title_en' => 'Dedicated Public Lighting Allocation', 'title_ar' => 'منحة مخصصة للإنارة العمومية', 'description_fr' => 'Financement dédié à l’extension de l’éclairage des quartiers.', 'description_en' => 'Funding dedicated to extending neighborhood lighting.', 'description_ar' => 'تمويل مخصص لتوسعة الإنارة بالأحياء.', 'type' => 'dotation_affectee', 'amount' => 420000.00, 'fiscal_year' => 2025, 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Dotation affectée aux routes rurales', 'title_en' => 'Dedicated Rural Roads Allocation', 'title_ar' => 'منحة مخصصة للطرقات الريفية', 'description_fr' => 'Crédit destiné à l’entretien des voies rurales de la commune.', 'description_en' => 'Credit for maintaining the commune’s rural roads.', 'description_ar' => 'اعتماد لصيانة الطرقات الريفية بالبلدية.', 'type' => 'dotation_affectee', 'amount' => 680000.00, 'fiscal_year' => 2026, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Subvention exceptionnelle pour les intempéries', 'title_en' => 'Exceptional Weather Damage Grant', 'title_ar' => 'منحة استثنائية لمجابهة الأضرار المناخية', 'description_fr' => 'Aide exceptionnelle pour réparer les dommages causés par les pluies.', 'description_en' => 'Exceptional aid to repair rain-related damage.', 'description_ar' => 'مساعدة استثنائية لإصلاح الأضرار الناتجة عن الأمطار.', 'type' => 'subvention_exceptionnelle', 'amount' => 275000.00, 'fiscal_year' => 2024, 'is_active' => true, 'order' => 5],
            ['title_fr' => 'Subvention exceptionnelle jeunesse et sport', 'title_en' => 'Exceptional Youth and Sports Grant', 'title_ar' => 'منحة استثنائية للشباب والرياضة', 'description_fr' => 'Soutien aux activités sportives et aux équipements de proximité.', 'description_en' => 'Support for sports activities and local equipment.', 'description_ar' => 'دعم للأنشطة الرياضية والتجهيزات القريبة.', 'type' => 'subvention_exceptionnelle', 'amount' => 145000.00, 'fiscal_year' => 2026, 'is_active' => true, 'order' => 6],
            ['title_fr' => 'Prêt pour le marché municipal', 'title_en' => 'Loan for the Municipal Market', 'title_ar' => 'قرض لتهيئة السوق البلدي', 'description_fr' => 'Financement remboursable pour la réhabilitation du marché.', 'description_en' => 'Repayable financing for market rehabilitation.', 'description_ar' => 'تمويل قابل للسداد لإعادة تهيئة السوق.', 'type' => 'pret', 'amount' => 950000.00, 'fiscal_year' => 2025, 'is_active' => true, 'order' => 7],
            ['title_fr' => 'Prêt pour le parc d’équipements', 'title_en' => 'Equipment Fleet Loan', 'title_ar' => 'قرض لاقتناء معدات بلدية', 'description_fr' => 'Financement pour l’acquisition de matériel d’entretien.', 'description_en' => 'Financing for purchasing maintenance equipment.', 'description_ar' => 'تمويل لاقتناء معدات الصيانة.', 'type' => 'pret', 'amount' => 530000.00, 'fiscal_year' => 2026, 'is_active' => true, 'order' => 8],
        ];

        foreach ($sources as $source) {
            FundingSource::firstOrCreate(['title_fr' => $source['title_fr']], $source);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Partnership;
use Illuminate\Database\Seeder;

class PartnershipSeeder extends Seeder
{
    public function run(): void
    {
        $partnerships = [
            ['title_fr' => 'Jumelage avec la commune de Tozeur', 'title_en' => 'Twin partnership with Tozeur', 'title_ar' => 'اتفاقية توأمة مع بلدية توزر', 'description_fr' => 'Échange d’expériences sur la valorisation du patrimoine et le tourisme local.', 'description_en' => 'Exchange of experience on heritage promotion and local tourism.', 'description_ar' => 'تبادل الخبرات في تثمين التراث والسياحة المحلية.', 'partner_country' => 'Tunisie', 'partner_city' => 'Tozeur', 'signed_date' => '2021-05-20', 'image' => null, 'is_active' => true, 'order' => 1],
            ['title_fr' => 'Coopération avec la ville de Gafsa', 'title_en' => 'Cooperation with Gafsa', 'title_ar' => 'تعاون مع مدينة قفصة', 'description_fr' => 'Coopération intercommunale pour l’amélioration des services de proximité.', 'description_en' => 'Inter-municipal cooperation to improve local services.', 'description_ar' => 'تعاون بين البلديات لتحسين الخدمات القريبة من المواطن.', 'partner_country' => 'Tunisie', 'partner_city' => 'Gafsa', 'signed_date' => null, 'image' => null, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Partenariat avec la commune de Kasserine', 'title_en' => 'Partnership with Kasserine', 'title_ar' => 'شراكة مع بلدية القصرين', 'description_fr' => 'Actions communes dans les domaines de la culture, du sport et de la jeunesse.', 'description_en' => 'Joint actions in culture, sports, and youth development.', 'description_ar' => 'أنشطة مشتركة في الثقافة والرياضة والشباب.', 'partner_country' => 'Tunisie', 'partner_city' => 'Kasserine', 'signed_date' => '2023-10-11', 'image' => null, 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Jumelage avec la ville de Biskra', 'title_en' => 'Twin partnership with Biskra', 'title_ar' => 'اتفاقية توأمة مع مدينة بسكرة', 'description_fr' => 'Échanges entre collectivités voisines sur la gestion des espaces publics.', 'description_en' => 'Neighboring local governments exchange public-space management practices.', 'description_ar' => 'تبادل بين الجماعات المحلية المتجاورة حول إدارة الفضاءات العامة.', 'partner_country' => 'Algérie', 'partner_city' => 'Biskra', 'signed_date' => '2022-09-08', 'image' => null, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Partenariat avec la ville de Béjaïa', 'title_en' => 'Partnership with Bejaia', 'title_ar' => 'شراكة مع مدينة بجاية', 'description_fr' => 'Partage d’expériences dans la participation citoyenne et la protection de l’environnement.', 'description_en' => 'Experience sharing on citizen participation and environmental protection.', 'description_ar' => 'تبادل الخبرات في المشاركة المواطنة وحماية البيئة.', 'partner_country' => 'Algérie', 'partner_city' => 'Béjaïa', 'signed_date' => null, 'image' => null, 'is_active' => true, 'order' => 5],
        ];

        foreach ($partnerships as $partnership) {
            Partnership::firstOrCreate(['title_fr' => $partnership['title_fr']], $partnership);
        }
    }
}

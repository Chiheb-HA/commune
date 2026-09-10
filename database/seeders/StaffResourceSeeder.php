<?php

namespace Database\Seeders;

use App\Models\StaffResource;
use Illuminate\Database\Seeder;

class StaffResourceSeeder extends Seeder
{
    public function run(): void
    {
        $resources = [
            ['title_fr' => 'Guide de l’agent communal', 'title_en' => 'Municipal Officer Guide', 'title_ar' => 'دليل العون البلدي', 'description_fr' => 'Repères pratiques pour l’accueil et l’orientation des citoyens.', 'description_en' => 'Practical guidance for welcoming and directing citizens.', 'description_ar' => 'إرشادات عملية لاستقبال المواطنين وتوجيههم.', 'type' => 'guide', 'file_path' => 'staff-resources/guide-agent-communal.pdf', 'external_link' => null, 'is_active' => true, 'order' => 1],
            ['title_fr' => 'Guide des procédures administratives', 'title_en' => 'Administrative Procedures Guide', 'title_ar' => 'دليل الإجراءات الإدارية', 'description_fr' => 'Présentation des principales procédures municipales.', 'description_en' => 'Overview of the main municipal procedures.', 'description_ar' => 'عرض لأهم الإجراءات البلدية.', 'type' => 'guide', 'file_path' => 'staff-resources/guide-procedures.pdf', 'external_link' => null, 'is_active' => true, 'order' => 2],
            ['title_fr' => 'Formation sur la participation citoyenne', 'title_en' => 'Citizen Participation Training', 'title_ar' => 'تكوين حول المشاركة المواطنة', 'description_fr' => 'Support de formation pour organiser les consultations locales.', 'description_en' => 'Training material for organizing local consultations.', 'description_ar' => 'وثيقة تكوين لتنظيم الاستشارات المحلية.', 'type' => 'formation', 'file_path' => 'staff-resources/formation-participation.pdf', 'external_link' => null, 'is_active' => true, 'order' => 3],
            ['title_fr' => 'Formation en gestion budgétaire', 'title_en' => 'Budget Management Training', 'title_ar' => 'تكوين في التصرف في الميزانية', 'description_fr' => 'Notions essentielles pour le suivi du budget communal.', 'description_en' => 'Essential concepts for monitoring the municipal budget.', 'description_ar' => 'مفاهيم أساسية لمتابعة ميزانية البلدية.', 'type' => 'formation', 'file_path' => 'staff-resources/formation-budget.pdf', 'external_link' => null, 'is_active' => true, 'order' => 4],
            ['title_fr' => 'Assistance technique en archivage', 'title_en' => 'Technical Assistance for Archives', 'title_ar' => 'مساعدة فنية في الأرشيف', 'description_fr' => 'Ressources pour améliorer le classement et la conservation des dossiers.', 'description_en' => 'Resources to improve file classification and preservation.', 'description_ar' => 'موارد لتحسين ترتيب الملفات وحفظها.', 'type' => 'assistance_technique', 'file_path' => null, 'external_link' => 'https://www.archives.nat.tn', 'is_active' => true, 'order' => 5],
            ['title_fr' => 'Assistance technique numérique', 'title_en' => 'Digital Technical Assistance', 'title_ar' => 'مساعدة فنية رقمية', 'description_fr' => 'Conseils pour la gestion des données et des services numériques.', 'description_en' => 'Advice on data management and digital services.', 'description_ar' => 'نصائح حول إدارة البيانات والخدمات الرقمية.', 'type' => 'assistance_technique', 'file_path' => 'staff-resources/assistance-numerique.pdf', 'external_link' => null, 'is_active' => true, 'order' => 6],
            ['title_fr' => 'Guide de sécurité des bâtiments municipaux', 'title_en' => 'Municipal Building Safety Guide', 'title_ar' => 'دليل سلامة المباني البلدية', 'description_fr' => 'Mesures de prévention pour les bâtiments et équipements publics.', 'description_en' => 'Prevention measures for public buildings and equipment.', 'description_ar' => 'إجراءات وقائية للمباني والتجهيزات العمومية.', 'type' => 'guide', 'file_path' => 'staff-resources/guide-securite.pdf', 'external_link' => null, 'is_active' => true, 'order' => 7],
            ['title_fr' => 'Formation à la communication de crise', 'title_en' => 'Crisis Communication Training', 'title_ar' => 'تكوين في الاتصال أثناء الأزمات', 'description_fr' => 'Préparer une communication claire lors des situations exceptionnelles.', 'description_en' => 'Prepare clear communication during exceptional situations.', 'description_ar' => 'إعداد اتصال واضح أثناء الحالات الاستثنائية.', 'type' => 'formation', 'file_path' => 'staff-resources/formation-crise.pdf', 'external_link' => null, 'is_active' => true, 'order' => 8],
        ];

        foreach ($resources as $resource) {
            StaffResource::firstOrCreate(['title_fr' => $resource['title_fr']], $resource);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\MunicipalService;
use Illuminate\Database\Seeder;

class MunicipalServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name_fr' => 'Permis de Construire',
                'name_en' => 'Building Permit',
                'name_ar' => 'رخصة البناء',
                'slug' => 'building-permit',
                'description_fr' => 'Demande de permis de construire pour les projets résidentiels et commerciaux',
                'description_en' => 'Building permit application for residential and commercial projects',
                'description_ar' => 'طلب رخصة بناء للمشاريع السكنية والتجارية',
                'icon' => 'building',
                'requirements_fr' => 'Plans du bâtiment, titre de propriété, photos du site',
                'requirements_en' => 'Building plans, property title, site photos',
                'requirements_ar' => 'مخططات المبنى، عنوان الملكية، صور الموقع',
                'phone' => '+1234567890',
                'email' => 'permis@commune.local',
                'documents_required_fr' => 'Formulaire de demande, plans, photos, pièce d\'identité',
                'documents_required_en' => 'Application form, plans, photos, ID',
                'documents_required_ar' => 'نموذج الطلب، المخططات، الصور، الهوية',
                'processing_time' => '15-20 business days',
                'cost' => '50€ - 200€ depending on project size',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name_fr' => 'Certificat de Résidence',
                'name_en' => 'Residence Certificate',
                'name_ar' => 'شهادة الإقامة',
                'slug' => 'residence-certificate',
                'description_fr' => 'Certificat officiel prouvant votre résidence dans la commune',
                'description_en' => 'Official certificate proving your residence in the municipality',
                'description_ar' => 'شهادة رسمية تثبت إقامتك في البلدية',
                'icon' => 'house',
                'requirements_fr' => 'Pièce d\'identité, justificatif de domicile',
                'requirements_en' => 'ID, proof of address',
                'requirements_ar' => 'الهوية، إثبات العنوان',
                'phone' => '+1234567891',
                'email' => 'certificat@commune.local',
                'documents_required_fr' => 'Pièce d\'identité, facture d\'électricité ou de gaz',
                'documents_required_en' => 'ID, electricity or gas bill',
                'documents_required_ar' => 'الهوية، فاتورة الكهرباء أو الغاز',
                'processing_time' => '2-3 business days',
                'cost' => '10€',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name_fr' => 'Inscription sur les Listes Électorales',
                'name_en' => 'Voter Registration',
                'name_ar' => 'التسجيل في القوائم الانتخابية',
                'slug' => 'voter-registration',
                'description_fr' => 'Inscription sur les listes électorales pour les élections municipales',
                'description_en' => 'Registration on electoral lists for municipal elections',
                'description_ar' => 'التسجيل في القوائم الانتخابية للانتخابات البلدية',
                'icon' => 'person-check',
                'requirements_fr' => 'Pièce d\'identité, justificatif de domicile',
                'requirements_en' => 'ID, proof of address',
                'requirements_ar' => 'الهوية، إثبات العنوان',
                'phone' => '+1234567892',
                'email' => 'elections@commune.local',
                'documents_required_fr' => 'Pièce d\'identité valide, justificatif de domicile récent',
                'documents_required_en' => 'Valid ID, recent proof of address',
                'documents_required_ar' => 'هوية سارية المفعول، إثبات عنوان حديث',
                'processing_time' => 'Immediate',
                'cost' => 'Free',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name_fr' => 'Demande de Subvention',
                'name_en' => 'Grant Application',
                'name_ar' => 'طلب المنح',
                'slug' => 'grant-application',
                'description_fr' => 'Demande de subventions pour les associations et projets locaux',
                'description_en' => 'Grant application for local associations and projects',
                'description_ar' => 'طلب منح للجمعيات والمشاريع المحلية',
                'icon' => 'cash',
                'requirements_fr' => 'Statuts de l\'association, budget prévisionnel, description du projet',
                'requirements_en' => 'Association statutes, projected budget, project description',
                'requirements_ar' => 'نظام الجمعية، الميزانية المتوقعة، وصف المشروع',
                'phone' => '+1234567893',
                'email' => 'subventions@commune.local',
                'documents_required_fr' => 'Dossier complet de l\'association, budget détaillé',
                'documents_required_en' => 'Complete association file, detailed budget',
                'documents_required_ar' => 'ملف الجمعية الكامل، ميزانية مفصلة',
                'processing_time' => '30-45 business days',
                'cost' => 'Free',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name_fr' => 'Déclaration de Naissance',
                'name_en' => 'Birth Registration',
                'name_ar' => 'تسجيل الميلاد',
                'slug' => 'birth-registration',
                'description_fr' => 'Déclaration de naissance à l\'état civil',
                'description_en' => 'Birth registration at civil registry',
                'description_ar' => 'تسجيل الميلاد في السجل المدني',
                'icon' => 'baby',
                'requirements_fr' => 'Certificat de naissance, pièce d\'identité des parents',
                'requirements_en' => 'Birth certificate, parents\' ID',
                'requirements_ar' => 'شهادة الميلاد، هوية الوالدين',
                'phone' => '+1234567894',
                'email' => 'etatcivil@commune.local',
                'documents_required_fr' => 'Certificat de naissance de l\'hôpital, pièces d\'identité des parents',
                'documents_required_en' => 'Hospital birth certificate, parents\' ID',
                'documents_required_ar' => 'شهادة ميلاد من المستشفى، هويات الوالدين',
                'processing_time' => 'Immediate',
                'cost' => 'Free',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($services as $service) {
            MunicipalService::firstOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}

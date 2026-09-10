<?php

namespace Database\Seeders;

use App\Models\TelephoneDirectory;
use Illuminate\Database\Seeder;

class TelephoneDirectorySeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            ['name_fr' => 'Police secours de Majel Bel Abbès', 'name_en' => 'Majel Bel Abbes Police', 'name_ar' => 'شرطة النجدة بماجل بلعباس', 'phone' => '197', 'extension' => null, 'email' => null, 'department' => 'Ministère de l’Intérieur', 'service' => 'Police', 'type' => 'emergency', 'description' => 'Urgences et sécurité des citoyens', 'is_active' => true, 'order' => 1],
            ['name_fr' => 'Protection civile de Majel Bel Abbès', 'name_en' => 'Majel Bel Abbes Civil Protection', 'name_ar' => 'الحماية المدنية بماجل بلعباس', 'phone' => '198', 'extension' => null, 'email' => null, 'department' => 'Protection civile', 'service' => 'Protection civile', 'type' => 'emergency', 'description' => 'Incendies, secours et interventions urgentes', 'is_active' => true, 'order' => 2],
            ['name_fr' => 'Garde nationale - Majel Bel Abbès', 'name_en' => 'National Guard - Majel Bel Abbes', 'name_ar' => 'الحرس الوطني بماجل بلعباس', 'phone' => '193', 'extension' => null, 'email' => null, 'department' => 'Garde nationale', 'service' => 'Garde nationale', 'type' => 'emergency', 'description' => 'Sécurité et intervention territoriale', 'is_active' => true, 'order' => 3],
            ['name_fr' => 'Pharmacie de garde', 'name_en' => 'On-call Pharmacy', 'name_ar' => 'الصيدلية المناوبة', 'phone' => '71 234 567', 'extension' => null, 'email' => null, 'department' => 'Santé', 'service' => 'Pharmacie de garde', 'type' => 'emergency', 'description' => 'Service de pharmacie de garde selon le calendrier local', 'is_active' => true, 'order' => 4],
            ['name_fr' => 'STEG - Agence de Majel Bel Abbès', 'name_en' => 'STEG - Majel Bel Abbes Office', 'name_ar' => 'الشركة التونسية للكهرباء والغاز - ماجل بلعباس', 'phone' => '71 239 222', 'extension' => null, 'email' => 'contact@steg.com.tn', 'department' => 'STEG', 'service' => 'Électricité et gaz', 'type' => 'support', 'description' => 'Signalement des pannes d’électricité et de gaz', 'is_active' => true, 'order' => 5],
            ['name_fr' => 'SONEDE - Service clientèle', 'name_en' => 'SONEDE - Customer Service', 'name_ar' => 'الشركة الوطنية لاستغلال وتوزيع المياه - مصلحة الحرفاء', 'phone' => '71 239 111', 'extension' => null, 'email' => 'contact@sonede.com.tn', 'department' => 'SONEDE', 'service' => 'Eau potable', 'type' => 'support', 'description' => 'Pannes et réclamations liées à l’eau potable', 'is_active' => true, 'order' => 6],
            ['name_fr' => 'Bureau d’accueil de la commune', 'name_en' => 'Municipal Reception Office', 'name_ar' => 'مكتب استقبال البلدية', 'phone' => '77 470 000', 'extension' => '101', 'email' => 'contact@majel-bel-abbes.gov.tn', 'department' => 'Commune de Majel Bel Abbès', 'service' => 'Accueil et orientation', 'type' => 'general', 'description' => 'Accueil et orientation des citoyens', 'is_active' => true, 'order' => 7],
            ['name_fr' => 'Service de propreté municipale', 'name_en' => 'Municipal Cleanliness Service', 'name_ar' => 'مصلحة النظافة البلدية', 'phone' => '77 470 015', 'extension' => '115', 'email' => 'proprete@majel-bel-abbes.gov.tn', 'department' => 'Service technique', 'service' => 'Propreté', 'type' => 'support', 'description' => 'Signalement des problèmes de propreté et de collecte', 'is_active' => true, 'order' => 8],
        ];

        foreach ($contacts as $contact) {
            TelephoneDirectory::firstOrCreate(['phone' => $contact['phone'], 'service' => $contact['service']], $contact);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        $citizen = User::where('email', 'citizen@commune.local')->first();
        $official = User::where('email', 'official@commune.local')->first();

        $complaints = [
            [
                'user_id' => $citizen?->cin,
                'complaint_number' => 'CMP-2024-001',
                'category' => 'infrastructure',
                'description_fr' => 'Nid-de-poule profond sur la rue Principale près de l\'école',
                'description_en' => 'Deep pothole on Main Street near the school',
                'description_ar' => 'حفرة عميقة في الشارع الرئيسي بالقرب من المدرسة',
                'location' => '123 Main Street',
                'status' => 'resolved',
                'priority' => 'high',
                'assigned_to' => $official?->cin,
                'response' => 'The pothole has been repaired. Thank you for reporting.',
                'resolved_at' => now()->subDays(5),
                'email' => $citizen?->email,
                'phone' => '+1234567890',
            ],
            [
                'user_id' => $citizen?->cin,
                'complaint_number' => 'CMP-2024-002',
                'category' => 'cleanliness',
                'description_fr' => 'Déchets accumulés dans le parc public',
                'description_en' => 'Accumulated waste in the public park',
                'description_ar' => 'تراكم النفايات في الحديقة العامة',
                'location' => 'Central Park',
                'status' => 'in_investigation',
                'priority' => 'medium',
                'assigned_to' => $official?->cin,
                'email' => $citizen?->email,
            ],
            [
                'user_id' => $citizen?->cin,
                'complaint_number' => 'CMP-2024-003',
                'category' => 'services',
                'description_fr' => 'Le service de collecte des ordures n\'est pas passé cette semaine',
                'description_en' => 'Garbage collection service did not come this week',
                'description_ar' => 'خدمة جمع القمامة لم تأتي هذا الأسبوع',
                'location' => '456 Oak Avenue',
                'status' => 'acknowledged',
                'priority' => 'high',
                'assigned_to' => $official?->cin,
                'email' => $citizen?->email,
            ],
            [
                'user_id' => $citizen?->cin,
                'complaint_number' => 'CMP-2024-004',
                'category' => 'security',
                'description_fr' => 'Éclairage public défectueux dans le quartier',
                'description_en' => 'Faulty street lighting in the neighborhood',
                'description_ar' => 'إنارة الشوارع معطلة في الحي',
                'location' => '789 Pine Street',
                'status' => 'new',
                'priority' => 'medium',
                'email' => $citizen?->email,
            ],
            [
                'user_id' => $citizen?->cin,
                'complaint_number' => 'CMP-2024-005',
                'category' => 'staff',
                'description_fr' => 'Comportement impoli d\'un employé municipal au guichet',
                'description_en' => 'Rude behavior of a municipal employee at the counter',
                'description_ar' => 'سلوك غير مهذب لموظف بلدي في النافذة',
                'location' => 'City Hall, Counter 3',
                'status' => 'in_investigation',
                'priority' => 'low',
                'assigned_to' => $official?->cin,
                'email' => $citizen?->email,
            ],
        ];

        foreach ($complaints as $complaint) {
            Complaint::firstOrCreate(
                ['complaint_number' => $complaint['complaint_number']],
                $complaint
            );
        }
    }
}

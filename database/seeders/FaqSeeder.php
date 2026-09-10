<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question_fr' => 'Comment contacter la commune de Majel Bel Abbès ?', 'question_en' => 'How can I contact Majel Bel Abbes municipality?', 'question_ar' => 'كيف يمكنني الاتصال ببلدية ماجل بلعباس؟', 'answer_fr' => 'Vous pouvez utiliser la page Contact ou appeler le standard municipal au 77 470 000.', 'answer_en' => 'Use the Contact page or call the municipal switchboard at 77 470 000.', 'answer_ar' => 'يمكنكم استعمال صفحة الاتصال أو الاتصال بمقسم البلدية على الرقم 77 470 000.', 'category' => 'contact', 'is_active' => true, 'order' => 1],
            ['question_fr' => 'Quels sont les horaires d’accueil ?', 'question_en' => 'What are the public reception hours?', 'question_ar' => 'ما هي أوقات استقبال المواطنين؟', 'answer_fr' => 'Les services accueillent le public du lundi au vendredi, de 8h30 à 12h30 et de 14h30 à 17h30.', 'answer_en' => 'Services receive the public Monday to Friday, from 8:30 to 12:30 and 14:30 to 17:30.', 'answer_ar' => 'تستقبل المصالح المواطنين من الاثنين إلى الجمعة من الساعة الثامنة والنصف إلى منتصف النهار ومن الثانية والنصف إلى الخامسة والنصف مساءً.', 'category' => 'contact', 'is_active' => true, 'order' => 2],
            ['question_fr' => 'Comment déposer une demande municipale en ligne ?', 'question_en' => 'How do I submit a municipal request online?', 'question_ar' => 'كيف أقدّم مطلباً بلدياً على الخط؟', 'answer_fr' => 'Choisissez le service concerné, remplissez le formulaire et joignez les documents demandés.', 'answer_en' => 'Choose the relevant service, complete the form, and attach the requested documents.', 'answer_ar' => 'اختاروا المصلحة المعنية ثم عمّروا الاستمارة وأرفقوا الوثائق المطلوبة.', 'category' => 'services', 'is_active' => true, 'order' => 3],
            ['question_fr' => 'Comment suivre l’état de ma demande ?', 'question_en' => 'How can I track my request?', 'question_ar' => 'كيف يمكنني متابعة حالة مطلبي؟', 'answer_fr' => 'Utilisez la page Suivi de demande avec votre numéro de demande et votre CIN.', 'answer_en' => 'Use the Request Tracking page with your request number and CIN.', 'answer_ar' => 'استعملوا صفحة متابعة الطلب بواسطة رقم الطلب ورقم بطاقة التعريف الوطنية.', 'category' => 'services', 'is_active' => true, 'order' => 4],
            ['question_fr' => 'Comment déposer une réclamation ?', 'question_en' => 'How do I submit a complaint?', 'question_ar' => 'كيف أقدّم شكوى؟', 'answer_fr' => 'Accédez à Déposer une réclamation, sélectionnez la catégorie et décrivez clairement le problème.', 'answer_en' => 'Open File a Complaint, select the category, and describe the issue clearly.', 'answer_ar' => 'ادخلوا إلى تقديم شكوى، واختاروا الصنف ثم صفوا المشكلة بوضوح.', 'category' => 'services', 'is_active' => true, 'order' => 5],
            ['question_fr' => 'Où consulter le budget communal ?', 'question_en' => 'Where can I view the municipal budget?', 'question_ar' => 'أين يمكن الاطلاع على ميزانية البلدية؟', 'answer_fr' => 'Les données budgétaires sont disponibles dans la rubrique Gouvernance & Référence.', 'answer_en' => 'Budget information is available under Governance & Reference.', 'answer_ar' => 'تتوفر المعطيات المتعلقة بالميزانية ضمن قسم الحوكمة والمرجع.', 'category' => 'finances', 'is_active' => true, 'order' => 6],
            ['question_fr' => 'Comment consulter les séances du conseil municipal ?', 'question_en' => 'How can I view municipal council sessions?', 'question_ar' => 'كيف يمكن الاطلاع على جلسات المجلس البلدي؟', 'answer_fr' => 'La page Séances du conseil publie les dates, les types de séances et les procès-verbaux disponibles.', 'answer_en' => 'The Council Sessions page publishes dates, session types, and available minutes.', 'answer_ar' => 'تنشر صفحة جلسات المجلس التواريخ وأنواع الجلسات ومحاضر الجلسات المتوفرة.', 'category' => 'governance', 'is_active' => true, 'order' => 7],
            ['question_fr' => 'Où trouver les avis d’appel à la concurrence ?', 'question_en' => 'Where can I find procurement notices?', 'question_ar' => 'أين يمكن العثور على إعلانات طلبات المنافسة؟', 'answer_fr' => 'Consultez la page Avis d’appel à la concurrence et filtrez les publications par type.', 'answer_en' => 'Visit Procurement Notices and filter publications by type.', 'answer_ar' => 'زوروا صفحة إعلانات طلبات المنافسة وقوموا بتصفية المنشورات حسب الصنف.', 'category' => 'governance', 'is_active' => true, 'order' => 8],
            ['question_fr' => 'Comment changer la langue du portail ?', 'question_en' => 'How do I change the portal language?', 'question_ar' => 'كيف أغيّر لغة البوابة؟', 'answer_fr' => 'Utilisez le sélecteur de langue en haut de chaque page pour choisir le français, l’arabe ou l’anglais.', 'answer_en' => 'Use the language selector at the top of each page to choose French, Arabic, or English.', 'answer_ar' => 'استعملوا محدد اللغة أعلى كل صفحة لاختيار العربية أو الفرنسية أو الإنجليزية.', 'category' => 'portal', 'is_active' => true, 'order' => 9],
            ['question_fr' => 'Comment s’inscrire à la newsletter ?', 'question_en' => 'How do I subscribe to the newsletter?', 'question_ar' => 'كيف أشترك في النشرة البريدية؟', 'answer_fr' => 'Saisissez votre adresse e-mail dans le formulaire Newsletter au pied de page.', 'answer_en' => 'Enter your email address in the Newsletter form in the footer.', 'answer_ar' => 'أدخلوا بريدكم الإلكتروني في استمارة النشرة البريدية أسفل الصفحة.', 'category' => 'portal', 'is_active' => true, 'order' => 10],
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate(['question_fr' => $faq['question_fr']], $faq);
        }
    }
}

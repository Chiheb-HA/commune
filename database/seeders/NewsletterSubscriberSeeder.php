<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscriber;
use Illuminate\Database\Seeder;

class NewsletterSubscriberSeeder extends Seeder
{
    public function run(): void
    {
        $subscribers = [
            ['email' => 'citoyen01@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-01-08 09:15:00'],
            ['email' => 'association.mbelabbes@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-01-14 11:20:00'],
            ['email' => 'commercant.local@exemple.tn', 'is_confirmed' => false, 'confirmation_token' => 'seed-token-003', 'subscribed_at' => '2026-02-02 16:10:00'],
            ['email' => 'famille.kasserine@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-02-19 08:45:00'],
            ['email' => 'jeune.citoyen@exemple.tn', 'is_confirmed' => false, 'confirmation_token' => 'seed-token-005', 'subscribed_at' => '2026-03-03 13:05:00'],
            ['email' => 'artisan.majel@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-03-22 10:30:00'],
            ['email' => 'enseignant.ecole@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-04-11 14:50:00'],
            ['email' => 'club.sportif@exemple.tn', 'is_confirmed' => false, 'confirmation_token' => 'seed-token-008', 'subscribed_at' => '2026-05-07 12:25:00'],
            ['email' => 'agriculteur.oued@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-05-18 09:00:00'],
            ['email' => 'professionnel.sante@exemple.tn', 'is_confirmed' => false, 'confirmation_token' => 'seed-token-010', 'subscribed_at' => '2026-06-06 15:40:00'],
            ['email' => 'habitante.centre@exemple.tn', 'is_confirmed' => true, 'confirmation_token' => null, 'subscribed_at' => '2026-07-12 17:15:00'],
            ['email' => 'parent.ecole@exemple.tn', 'is_confirmed' => false, 'confirmation_token' => 'seed-token-012', 'subscribed_at' => '2026-08-21 10:05:00'],
        ];

        foreach ($subscribers as $subscriber) {
            NewsletterSubscriber::firstOrCreate(['email' => $subscriber['email']], $subscriber);
        }
    }
}

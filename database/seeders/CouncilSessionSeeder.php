<?php

namespace Database\Seeders;

use App\Models\CouncilSession;
use Illuminate\Database\Seeder;

class CouncilSessionSeeder extends Seeder
{
    public function run(): void
    {
        $sessions = [
            ['title' => 'Session ordinaire du conseil municipal - janvier 2025', 'session_date' => '2025-01-25', 'type' => 'ordinaire', 'committee_name' => 'Conseil municipal', 'minutes_document' => 'council-sessions/proces-verbal-janvier-2025.pdf', 'status' => 'held'],
            ['title' => 'Session extraordinaire consacrée au budget 2025', 'session_date' => '2025-02-14', 'type' => 'extraordinaire', 'committee_name' => 'Commission des finances', 'minutes_document' => 'council-sessions/proces-verbal-budget-2025.pdf', 'status' => 'held'],
            ['title' => 'Session ordinaire du conseil municipal - juin 2025', 'session_date' => '2025-06-28', 'type' => 'ordinaire', 'committee_name' => 'Conseil municipal', 'minutes_document' => null, 'status' => 'held'],
            ['title' => 'Session extraordinaire sur les projets de voirie', 'session_date' => '2026-09-24', 'type' => 'extraordinaire', 'committee_name' => 'Commission des travaux', 'minutes_document' => null, 'status' => 'upcoming'],
            ['title' => 'Session ordinaire du conseil municipal - octobre 2026', 'session_date' => '2026-10-17', 'type' => 'ordinaire', 'committee_name' => 'Conseil municipal', 'minutes_document' => null, 'status' => 'upcoming'],
            ['title' => 'Session ordinaire du conseil municipal - décembre 2026', 'session_date' => '2026-12-19', 'type' => 'ordinaire', 'committee_name' => 'Conseil municipal', 'minutes_document' => null, 'status' => 'upcoming'],
        ];

        foreach ($sessions as $session) {
            CouncilSession::firstOrCreate(
                ['title' => $session['title'], 'session_date' => $session['session_date']],
                $session
            );
        }
    }
}

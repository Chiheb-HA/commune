<?php

namespace Database\Seeders;

use App\Models\Association;
use Illuminate\Database\Seeder;

class AssociationSeeder extends Seeder
{
    public function run(): void
    {
        $associations = [
            ['matricule' => 'ASS-MBA-001', 'authorization_number' => 'AUT-2018-014', 'authorization_date' => '2018-04-12', 'name' => 'Association de développement de Majel Bel Abbès', 'interest_area' => 'Développement local', 'correspondence_address' => 'Maison des associations, Majel Bel Abbès', 'email' => 'developpement@associations.local', 'president_name' => 'Noura Ben Salem', 'president_phone' => '77 470 101', 'president_mobile' => '98 470 101', 'contact_person_name' => 'Hatem Trabelsi', 'contact_person_role' => 'Coordinateur', 'contact_person_phone' => '77 470 102', 'contact_person_mobile' => '22 470 102', 'member_count' => 86],
            ['matricule' => 'ASS-MBA-002', 'authorization_number' => 'AUT-2019-031', 'authorization_date' => '2019-09-21', 'name' => 'Association Jeunesse et Citoyenneté', 'interest_area' => 'Jeunesse et citoyenneté', 'correspondence_address' => 'Rue de la Jeunesse, Majel Bel Abbès', 'email' => 'jeunesse@associations.local', 'president_name' => 'Mohamed Khelifi', 'president_phone' => '77 470 111', 'president_mobile' => '97 470 111', 'contact_person_name' => 'Amel Gharbi', 'contact_person_role' => 'Secrétaire générale', 'contact_person_phone' => null, 'contact_person_mobile' => '25 470 112', 'member_count' => 54],
            ['matricule' => 'ASS-MBA-003', 'authorization_number' => null, 'authorization_date' => null, 'name' => 'Club environnement de l’Oued El Hatab', 'interest_area' => 'Environnement', 'correspondence_address' => 'Oued El Hatab, Majel Bel Abbès', 'email' => 'environnement@associations.local', 'president_name' => 'Salah Ayari', 'president_phone' => null, 'president_mobile' => '29 470 121', 'contact_person_name' => 'Rim Mansouri', 'contact_person_role' => 'Bénévole', 'contact_person_phone' => null, 'contact_person_mobile' => '54 470 122', 'member_count' => 31],
            ['matricule' => 'ASS-MBA-004', 'authorization_number' => 'AUT-2021-008', 'authorization_date' => '2021-02-17', 'name' => 'Fédération locale des artisans', 'interest_area' => 'Artisanat et économie sociale', 'correspondence_address' => 'Marché municipal, Majel Bel Abbès', 'email' => 'artisans@associations.local', 'president_name' => 'Fathi Jlassi', 'president_phone' => '77 470 131', 'president_mobile' => null, 'contact_person_name' => 'Sonia Oueslati', 'contact_person_role' => 'Trésorière', 'contact_person_phone' => '77 470 132', 'contact_person_mobile' => '26 470 132', 'member_count' => 42],
            ['matricule' => 'ASS-MBA-005', 'authorization_number' => 'AUT-2022-019', 'authorization_date' => null, 'name' => 'Association sportive Majel', 'interest_area' => 'Sport et loisirs', 'correspondence_address' => 'Complexe sportif municipal', 'email' => 'sport@associations.local', 'president_name' => 'Yassine Saïdi', 'president_phone' => null, 'president_mobile' => '20 470 141', 'contact_person_name' => 'Khadija Ferchichi', 'contact_person_role' => 'Membre du bureau', 'contact_person_phone' => null, 'contact_person_mobile' => '23 470 142', 'member_count' => 118],
            ['matricule' => 'ASS-MBA-006', 'authorization_number' => 'AUT-2023-027', 'authorization_date' => '2023-11-05', 'name' => 'Association de soutien aux familles', 'interest_area' => 'Solidarité sociale', 'correspondence_address' => 'Centre social, Majel Bel Abbès', 'email' => 'solidarite@associations.local', 'president_name' => 'Saida Cherif', 'president_phone' => '77 470 151', 'president_mobile' => '98 470 151', 'contact_person_name' => 'Meriem Ben Amor', 'contact_person_role' => 'Assistante sociale', 'contact_person_phone' => null, 'contact_person_mobile' => '24 470 152', 'member_count' => 67],
        ];

        foreach ($associations as $association) {
            Association::firstOrCreate(['matricule' => $association['matricule']], $association);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in order
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            MunicipalServiceSeeder::class,
            BudgetSeeder::class,
            ArticleSeeder::class,
            NewsSeeder::class,
            EventSeeder::class,
            ComplaintSeeder::class,
        ]);
    }
}

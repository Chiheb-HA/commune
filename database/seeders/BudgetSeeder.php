<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\BudgetCategory;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    public function run(): void
    {
        // Create budget categories
        $categories = [
            ['code' => 'INF', 'name_fr' => 'Infrastructure', 'name_en' => 'Infrastructure', 'name_ar' => 'البنية التحتية'],
            ['code' => 'SOC', 'name_fr' => 'Services Sociaux', 'name_en' => 'Social Services', 'name_ar' => 'الخدمات الاجتماعية'],
            ['code' => 'SEC', 'name_fr' => 'Sécurité', 'name_en' => 'Security', 'name_ar' => 'الأمن'],
            ['code' => 'CUL', 'name_fr' => 'Culture et Sports', 'name_en' => 'Culture and Sports', 'name_ar' => 'الثقافة والرياضة'],
            ['code' => 'ADM', 'name_fr' => 'Administration', 'name_en' => 'Administration', 'name_ar' => 'الإدارة'],
        ];

        foreach ($categories as $category) {
            BudgetCategory::firstOrCreate(
                ['code' => $category['code']],
                $category
            );
        }

        // Create budgets
        $infrastructureCategory = BudgetCategory::where('code', 'INF')->first();
        $adminUser = \App\Models\User::where('email', 'admin@commune.local')->first();
        
        $budgets = [
            [
                'fiscal_year' => 2024,
                'budget_category_id' => $infrastructureCategory->id,
                'allocated_amount' => 5000000.00,
                'spent_amount' => 3250000.00,
                'status' => 'active',
                'created_by' => $adminUser->cin,
            ],
            [
                'fiscal_year' => 2023,
                'budget_category_id' => $infrastructureCategory->id,
                'allocated_amount' => 4500000.00,
                'spent_amount' => 4420000.00,
                'status' => 'closed',
                'created_by' => $adminUser->cin,
            ],
        ];

        foreach ($budgets as $budget) {
            Budget::firstOrCreate(
                ['fiscal_year' => $budget['fiscal_year']],
                $budget
            );
        }
    }
}

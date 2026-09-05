<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Expense;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BudgetController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->query('year');

        $budgetsQuery = Budget::active()
            ->with(['category', 'allocations'])
            ->orderByDesc('fiscal_year');

        if ($year) {
            $budgetsQuery->byFiscalYear($year);
        }

        $budgets = $budgetsQuery->get();
        $years = Budget::query()
            ->select('fiscal_year')
            ->distinct()
            ->orderByDesc('fiscal_year')
            ->pluck('fiscal_year');

        $allocationsByCategory = $budgets->groupBy(function ($budget) {
            return $budget->category?->name ?? __('messages.uncategorized');
        });

        $revenueSummary = collect();
        $expenseSummary = collect();

        if (Schema::hasTable('revenues')) {
            $revenueSummary = Revenue::query()
                ->when($year, function ($query) use ($year) {
                    $query->whereYear('revenue_date', $year);
                })
                ->get()
                ->groupBy(fn ($revenue) => $revenue->revenue_date?->year)
                ->map(fn ($revenues) => $revenues->sum('amount'));
        }

        if (Schema::hasTable('expenses')) {
            $expenseSummary = Expense::query()
                ->when($year, function ($query) use ($year) {
                    $query->whereYear('expense_date', $year);
                })
                ->get()
                ->groupBy(fn ($expense) => $expense->expense_date?->year)
                ->map(fn ($expenses) => $expenses->sum('amount'));
        }

        return view('public.budget.index', compact(
            'allocationsByCategory',
            'expenseSummary',
            'revenueSummary',
            'year',
            'years'
        ));
    }
}
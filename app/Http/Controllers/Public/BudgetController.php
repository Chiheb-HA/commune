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

    public function exportCsv(Request $request)
    {
        $year = $request->query('year');
        $allocations = Budget::active()
            ->with(['category', 'allocations'])
            ->when($year, fn ($query) => $query->byFiscalYear($year))
            ->get()
            ->flatMap(function ($budget) {
                return $budget->allocations->map(function ($allocation) use ($budget) {
                    return [
                        'category' => $budget->category?->name ?? __('messages.uncategorized'),
                        'allocated' => $allocation->allocated_amount,
                        'spent' => $allocation->spent_amount,
                    ];
                });
            });

        $hasArabicText = $allocations->contains(function ($allocation) {
            return preg_match('/[\x{0600}-\x{06FF}]/u', $allocation['category']) === 1;
        });

        $filename = 'budget-' . ($year ?: 'all') . '.csv';

        return response()->streamDownload(function () use ($allocations, $hasArabicText) {
            $handle = fopen('php://output', 'w');

            if ($hasArabicText) {
                fwrite($handle, "\xEF\xBB\xBF");
            }

            fputcsv($handle, ['Category', 'Allocated', 'Spent']);

            foreach ($allocations as $allocation) {
                fputcsv($handle, [
                    $allocation['category'],
                    $allocation['allocated'],
                    $allocation['spent'],
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
@extends('layouts.app')

@section('title', __('messages.budget_title'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.budget_title') }}</h1>
    <p class="lead mb-5">{{ __('messages.budget_description') }}</p>

    <form method="GET" action="{{ route('budget.index') }}" class="row g-3 align-items-end mb-5">
        <div class="col-sm-6 col-md-4">
            <label for="budget-year" class="form-label">{{ __('messages.budget_year') }}</label>
            <select id="budget-year" name="year" class="form-select">
                <option value="">{{ __('messages.all') }}</option>
                @foreach($years as $availableYear)
                    <option value="{{ $availableYear }}" @selected((string) $year === (string) $availableYear)>{{ $availableYear }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">{{ __('messages.search') }}</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('budget.export', ['year' => request('year')]) }}" class="btn btn-outline-primary">{{ __('messages.export_csv') }}</a>
        </div>
    </form>

    @if($allocationsByCategory->isNotEmpty())
        <div class="table-responsive mb-5">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('messages.category') }}</th>
                        <th scope="col">{{ __('messages.allocated') }}</th>
                        <th scope="col">{{ __('messages.spent') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allocationsByCategory as $category => $categoryBudgets)
                        <tr>
                            <th scope="row">{{ $category }}</th>
                            <td>{{ number_format($categoryBudgets->flatMap(function ($budget) { return $budget->allocations; })->sum('allocated_amount'), 2) }}</td>
                            <td>{{ number_format($categoryBudgets->flatMap(function ($budget) { return $budget->allocations; })->sum('spent_amount'), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info mb-5">{{ __('messages.no_budget_data') }}</div>
    @endif

    <h2 class="h4 mb-3">{{ __('messages.revenue') }} / {{ __('messages.expenses') }}</h2>
    @if($revenueSummary->isNotEmpty() || $expenseSummary->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">{{ __('messages.budget_year') }}</th>
                        <th scope="col">{{ __('messages.revenue') }}</th>
                        <th scope="col">{{ __('messages.expenses') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($revenueSummary->keys()->merge($expenseSummary->keys())->unique()->sortDesc() as $summaryYear)
                        <tr>
                            <th scope="row">{{ $summaryYear }}</th>
                            <td>{{ number_format($revenueSummary->get($summaryYear, 0), 2) }}</td>
                            <td>{{ number_format($expenseSummary->get($summaryYear, 0), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">{{ __('messages.no_financial_summary') }}</div>
    @endif
</div>
@endsection
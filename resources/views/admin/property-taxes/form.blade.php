@extends('layouts.admin')

@section('page-title', isset($propertyTax) ? __('messages.Edit Property Tax Record') : __('messages.New Property Tax Record'))
@section('title', isset($propertyTax) ? __('messages.Edit Property Tax Record') : __('messages.New Property Tax Record'))

@section('content')
<div class="page-header">
    <h1>{{ isset($propertyTax) ? __('messages.Edit Property Tax Record') : __('messages.New Property Tax Record') }}</h1>
    <p class="text-muted">{{ isset($propertyTax) ? __('messages.Update property tax record') : __('messages.Create a new property tax record') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($propertyTax) ? route('admin.property-taxes.update', $propertyTax) : route('admin.property-taxes.store') }}">
            @csrf
            @if(isset($propertyTax))
                @method('PUT')
            @endif

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.CIN') }}</label>
                    <input type="text" name="cin" class="form-control" value="{{ old('cin', $propertyTax->cin ?? '') }}" required maxlength="8">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Property Reference') }}</label>
                    <input type="text" name="property_reference" class="form-control" value="{{ old('property_reference', $propertyTax->property_reference ?? '') }}" required>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Tax Type') }}</label>
                    <select name="tax_type" class="form-select" required>
                        <option value="TIB" {{ old('tax_type', $propertyTax->tax_type ?? '') === 'TIB' ? 'selected' : '' }}>TIB</option>
                        <option value="TNB" {{ old('tax_type', $propertyTax->tax_type ?? '') === 'TNB' ? 'selected' : '' }}>TNB</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Fiscal Year') }}</label>
                    <input type="text" name="fiscal_year" class="form-control" value="{{ old('fiscal_year', $propertyTax->fiscal_year ?? '') }}" required>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Amount Due') }}</label>
                    <input type="number" name="amount_due" class="form-control" value="{{ old('amount_due', $propertyTax->amount_due ?? '') }}" required step="0.01" min="0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Amount Paid') }}</label>
                    <input type="number" name="amount_paid" class="form-control" value="{{ old('amount_paid', $propertyTax->amount_paid ?? 0) }}" step="0.01" min="0">
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Status') }}</label>
                    <select name="status" class="form-select" required>
                        <option value="pending" {{ old('status', $propertyTax->status ?? '') === 'pending' ? 'selected' : '' }}>pending</option>
                        <option value="partial" {{ old('status', $propertyTax->status ?? '') === 'partial' ? 'selected' : '' }}>partial</option>
                        <option value="paid" {{ old('status', $propertyTax->status ?? '') === 'paid' ? 'selected' : '' }}>paid</option>
                        <option value="overdue" {{ old('status', $propertyTax->status ?? '') === 'overdue' ? 'selected' : '' }}>overdue</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Due Date') }}</label>
                    <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $propertyTax->due_date?->format('Y-m-d') ?? '') }}" required>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.property-taxes.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

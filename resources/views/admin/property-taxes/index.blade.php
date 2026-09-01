@extends('layouts.admin')

@section('page-title', __('messages.Property Tax Records'))
@section('title', __('messages.Property Tax Records'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Property Tax Records') }}</h1>
    <p class="text-muted">{{ __('messages.Manage property tax records') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <form method="GET" class="d-inline-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="{{ __('messages.Search...') }}" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Search') }}</button>
                </form>
            </div>
            <a href="{{ route('admin.property-taxes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.New Property Tax Record') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.CIN') }}</th>
                        <th>{{ __('messages.Property Reference') }}</th>
                        <th>{{ __('messages.Tax Type') }}</th>
                        <th>{{ __('messages.Fiscal Year') }}</th>
                        <th>{{ __('messages.Amount Due') }}</th>
                        <th>{{ __('messages.Amount Paid') }}</th>
                        <th>{{ __('messages.Status') }}</th>
                        <th>{{ __('messages.Due Date') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($taxRecords as $taxRecord)
                        <tr>
                            <td>{{ $taxRecord->cin }}</td>
                            <td>{{ $taxRecord->property_reference }}</td>
                            <td>
                                <span class="badge bg-info">{{ $taxRecord->tax_type }}</span>
                            </td>
                            <td>{{ $taxRecord->fiscal_year }}</td>
                            <td>{{ number_format($taxRecord->amount_due, 2) }}</td>
                            <td>{{ number_format($taxRecord->amount_paid, 2) }}</td>
                            <td>
                                <span class="badge {{ $taxRecord->status === 'paid' ? 'bg-success' : ($taxRecord->status === 'overdue' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ $taxRecord->status }}
                                </span>
                            </td>
                            <td>{{ $taxRecord->due_date->format('Y-m-d') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.property-taxes.edit', $taxRecord) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.property-taxes.destroy', $taxRecord) }}" style="display: inline;" data-confirm="{{ __('messages.Are you sure?') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <p class="text-muted mb-0">{{ __('messages.No tax records found') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

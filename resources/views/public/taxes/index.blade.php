@extends('layouts.guest')

@section('page-title', __('messages.Property Tax'))
@section('title', __('messages.Property Tax'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('messages.Search Tax Records') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('taxes.search') }}">
                        @csrf
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.CIN') }}</label>
                                <input type="text" name="cin" class="form-control" value="{{ $cin ?? '' }}" required maxlength="8">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.Property Reference') }}</label>
                                <input type="text" name="property_reference" class="form-control" value="{{ $property_reference ?? '' }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.Search') }}</button>
                    </form>
                </div>
            </div>

            @if($taxRecords !== null)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('messages.Tax Record Details') }}</h4>
                    </div>
                    <div class="card-body">
                        @if($taxRecords->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.Tax Type') }}</th>
                                            <th>{{ __('messages.Fiscal Year') }}</th>
                                            <th>{{ __('messages.Amount Due') }}</th>
                                            <th>{{ __('messages.Amount Paid') }}</th>
                                            <th>{{ __('messages.Status') }}</th>
                                            <th>{{ __('messages.Due Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($taxRecords as $taxRecord)
                                            <tr>
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                {{ __('messages.No tax records found') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', __('messages.complaint_details'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('messages.complaint_details') }}</h1>
        <a href="{{ route('citizen.complaints.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.complaint_number') }}:</strong>
                    <span>{{ $complaint->complaint_number }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.status') }}:</strong>
                    <span class="badge bg-{{ $complaint->status === 'resolved' ? 'success' : ($complaint->status === 'new' ? 'warning' : 'info') }}">
                        {{ $complaint->status }}
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.category') }}:</strong>
                    <span>{{ $complaint->category ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.priority') }}:</strong>
                    <span>{{ $complaint->priority }}</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.location') }}:</strong>
                    <span>{{ $complaint->location ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.reference_number') }}:</strong>
                    <span>{{ $complaint->reference_number ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.created_at') }}:</strong>
                    <span>{{ $complaint->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.resolved_at') }}:</strong>
                    <span>{{ $complaint->resolved_at ? $complaint->resolved_at->format('d M Y H:i') : 'N/A' }}</span>
                </div>
            </div>
            <div class="mb-3">
                <strong>{{ __('messages.description') }}:</strong>
                <p>{{ $complaint->description_fr ?? $complaint->description_en ?? 'N/A' }}</p>
            </div>
            @if($complaint->response)
                <div class="mb-3">
                    <strong>{{ __('messages.response') }}:</strong>
                    <p>{{ $complaint->response }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

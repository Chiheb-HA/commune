@extends('layouts.app')

@section('title', __('messages.request_details'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('messages.request_details') }}</h1>
        <a href="{{ route('citizen.requests.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.request_number') }}:</strong>
                    <span>{{ $request->request_number }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.status') }}:</strong>
                    <span class="badge bg-{{ $request->status === 'completed' ? 'success' : ($request->status === 'rejected' ? 'danger' : ($request->status === 'on_hold' ? 'secondary' : ($request->status === 'in_progress' ? 'info' : 'warning'))) }}">
                        {{ __('messages.' . ucfirst(str_replace('_', ' ', $request->status))) }}
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.service') }}:</strong>
                    <span>{{ $request->service->name ?? 'N/A' }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.priority') }}:</strong>
                    <span>{{ $request->priority }}</span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ __('messages.created_at') }}:</strong>
                    <span>{{ $request->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="col-md-6">
                    <strong>{{ __('messages.reference_number') }}:</strong>
                    <span>{{ $request->reference_number ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="mb-3">
                <strong>{{ __('messages.description') }}:</strong>
                <p>{{ $request->description_fr ?? $request->description_en ?? 'N/A' }}</p>
            </div>
            @if($request->notes)
                <div class="mb-3">
                    <strong>{{ __('messages.notes') }}:</strong>
                    <p>{{ $request->notes }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

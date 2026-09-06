@extends('layouts.app')

@section('title', __('messages.council_sessions'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.council_sessions') }}</h1>
    <p class="lead mb-5">{{ __('messages.council_sessions_description') }}</p>

    <div class="row g-4">
        @forelse($sessions as $session)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between gap-2 mb-3">
                            <span class="badge {{ $session->status === 'upcoming' ? 'bg-primary' : ($session->status === 'held' ? 'bg-success' : 'bg-secondary') }}">
                                {{ __('messages.council_status_' . $session->status) }}
                            </span>
                            <span class="text-muted small">{{ $session->session_date->translatedFormat('d F Y') }}</span>
                        </div>
                        <h2 class="h5 card-title">{{ $session->title }}</h2>
                        <p class="text-muted mb-0">{{ __('messages.council_type_' . $session->type) }}</p>
                        @if($session->committee_name)
                            <p class="small mt-2 mb-0"><strong>{{ __('messages.committee') }}:</strong> {{ $session->committee_name }}</p>
                        @endif
                    </div>
                    @if($session->minutes_document)
                        <div class="card-footer bg-transparent">
                            <a href="{{ asset('storage/' . $session->minutes_document) }}" target="_blank" rel="noopener" class="btn btn-sm btn-primary">
                                {{ __('messages.view_minutes') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">{{ __('messages.no_council_sessions') }}</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
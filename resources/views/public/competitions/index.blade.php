@extends('layouts.app')

@section('title', __('messages.Competitions'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Competitions') }}</h1>
    <p class="lead text-muted mb-5">{{ __('messages.competitions_description') }}</p>

    <div class="row g-4">
        @forelse($competitions as $competition)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $competition->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($competition->description, 100) }}</p>
                        <div class="mb-2">
                            <span class="badge {{ $competition->status === 'open' ? 'bg-success' : ($competition->status === 'closed' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $competition->status_label }}
                            </span>
                        </div>
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar"></i> {{ $competition->start_date->format('d/m/Y') }} - {{ $competition->end_date->format('d/m/Y') }}
                        </small>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('competitions.show', $competition->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.No competitions available at the moment.') }}
                </div>
            </div>
        @endforelse
    </div>

    @if($competitions->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $competitions->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

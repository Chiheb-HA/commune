@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('Municipal Events') }}</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="{{ __('Search events...') }}" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
            </form>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select" onchange="location.href='?sort='+this.value">
                <option value="upcoming" {{ request('sort') === 'upcoming' ? 'selected' : '' }}>{{ __('Upcoming First') }}</option>
                <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>{{ __('Latest') }}</option>
                <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>{{ __('Oldest') }}</option>
            </select>
        </div>
    </div>
    
    <div class="row g-4">
        @forelse($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($event->featured_image)
                        <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-info text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-calendar-event" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-success">
                                {{ $event->start_date->translatedFormat('d F Y') }}
                            </span>
                        </div>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text text-muted small">
                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                        </p>
                        <p class="card-text small">{{ Str::limit($event->description, 80) }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-primary">{{ __('View Details') }}</a>
                        @if(auth()->check())
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registerModal{{ $event->id }}">
                                {{ __('Register') }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('No events found.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($events->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $events->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

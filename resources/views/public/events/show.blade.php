@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="container-lg py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">{{ __('Events') }}</a></li>
            <li class="breadcrumb-item active">{{ $event->title }}</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="mb-3">{{ $event->title }}</h1>
                    <div class="d-flex gap-3 align-items-center text-muted mb-4 flex-wrap">
                        <span>
                            <i class="bi bi-calendar"></i>
                            {{ $event->start_date->format('d M Y, H:i') }}
                        </span>
                        <span>
                            <i class="bi bi-geo-alt"></i>
                            {{ $event->location }}
                        </span>
                        <span class="badge bg-success">
                            {{ $registrations->count() }} {{ __('Registered') }}
                        </span>
                    </div>
                </header>
                
                @if($event->featured_image)
                    <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">
                @endif
                
                <div class="content mb-5">
                    <h3 class="mb-3">{{ __('About This Event') }}</h3>
                    {!! $event->description !!}
                </div>
                
                <!-- Event Details -->
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-3">{{ __('Event Date & Time') }}</h6>
                                <p class="mb-2">
                                    <strong>{{ __('Start:') }}</strong> {{ $event->start_date->format('d M Y, H:i') }}
                                </p>
                                <p>
                                    <strong>{{ __('End:') }}</strong> {{ $event->end_date->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">{{ __('Location') }}</h6>
                                <p>{{ $event->location }}</p>
                                <p class="text-muted small">{{ $event->address ?? 'Address not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Registration Section -->
                @auth
                    @if(!$isRegistered)
                        <div class="card border-success mb-5">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Register for this Event') }}</h5>
                                <p class="card-text">{{ __('Join us for this exciting event. Click below to register.') }}</p>
                                <form method="POST" action="{{ route('events.register', $event->id) }}" data-confirm="{{ __('messages.Are you sure?') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="bi bi-check-circle"></i> {{ __('Register Now') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-check-circle"></i> {{ __('You are registered for this event!') }}
                        </div>
                    @endif
                @else
                    <div class="card mb-5">
                        <div class="card-body">
                            <p>{{ __('Please') }} <a href="{{ route('login') }}">{{ __('login') }}</a> {{ __('to register for this event.') }}</p>
                        </div>
                    </div>
                @endauth
                
                <!-- Contact -->
                @if($event->contact_email || $event->contact_phone)
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">{{ __('Contact Information') }}</h6>
                        </div>
                        <div class="card-body">
                            @if($event->contact_email)
                                <p class="mb-2">
                                    <strong>{{ __('Email:') }}</strong> 
                                    <a href="mailto:{{ $event->contact_email }}">{{ $event->contact_email }}</a>
                                </p>
                            @endif
                            @if($event->contact_phone)
                                <p>
                                    <strong>{{ __('Phone:') }}</strong> 
                                    <a href="tel:{{ $event->contact_phone }}">{{ $event->contact_phone }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                @endif
            </article>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Event Summary -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="mb-0">{{ __('Event Summary') }}</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>{{ __('Status:') }}</strong>
                        @if($event->start_date->isFuture())
                            <span class="badge bg-success">{{ __('Upcoming') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __('Past Event') }}</span>
                        @endif
                    </p>
                    <p class="mb-2">
                        <strong>{{ __('Capacity:') }}</strong> {{ $event->capacity ?? __('Unlimited') }}
                    </p>
                    <p>
                        <strong>{{ __('Registered:') }}</strong> {{ $registrations->count() }}
                    </p>
                </div>
            </div>
            
            <!-- Share -->
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Share Event') }}</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('events.show', $event->slug)) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('events.show', $event->slug)) }}&text={{ urlencode($event->title) }}" class="btn btn-sm btn-outline-info" target="_blank">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="mailto:?subject={{ urlencode($event->title) }}&body={{ urlencode(route('events.show', $event->slug)) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

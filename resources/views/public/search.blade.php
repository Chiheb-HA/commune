@extends('layouts.app')

@section('title', __('messages.search'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Search Results') }}</h1>
    
    @if($query)
        <p class="mb-4 text-muted">{{ __('messages.Search query: :query', ['query' => $query]) }}</p>
    @endif
    
    <!-- Municipal Services Results -->
    @if($services->count() > 0)
        <h2 class="h4 mb-3">{{ __('messages.municipal_services') }}</h2>
        <div class="row g-4 mb-5">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="mb-3">
                                @if($service->icon)
                                    <i class="{{ $service->icon }}" style="font-size: 2rem; color: var(--primary);"></i>
                                @else
                                    <i class="bi bi-building" style="font-size: 2rem; color: var(--primary);"></i>
                                @endif
                            </div>
                            <h5 class="card-title">{{ $service->getTranslatableContent('name') }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($service->getTranslatableContent('description'), 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('services.index') }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Departments Results -->
    @if($departments->count() > 0)
        <h2 class="h4 mb-3">{{ __('messages.departments') }}</h2>
        <div class="row g-4 mb-5">
            @foreach($departments as $department)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $department->getTranslatableContent('name') }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($department->getTranslatableContent('description'), 100) }}</p>
                            @if($department->head)
                                <small class="text-muted">
                                    <strong>{{ __('messages.head_official') }}:</strong> {{ $department->head->name }}
                                </small>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('departments.index') }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Officials Results -->
    @if($officials->count() > 0)
        <h2 class="h4 mb-3">{{ __('messages.officials') }}</h2>
        <div class="row g-4 mb-5">
            @foreach($officials as $official)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                @if($official->photo)
                                    <img src="{{ asset('storage/' . $official->photo) }}" 
                                         alt="{{ $official->user->name ?? 'Official' }}" 
                                         class="rounded-circle me-3" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                         style="width: 50px; height: 50px;">
                                        <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                                    </div>
                                @endif
                                <div>
                                    <h5 class="card-title mb-1">{{ $official->user->name ?? 'N/A' }}</h5>
                                    <p class="card-text text-muted small mb-0">{{ $official->getTranslatableContent('position') }}</p>
                                </div>
                            </div>
                            @if($official->department)
                                <small class="text-muted">
                                    <strong>{{ __('messages.departments') }}:</strong> {{ $official->department->getTranslatableContent('name') }}
                                </small>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('officials.index') }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Articles Results -->
    <h2 class="h4 mb-3">{{ __('messages.articles') }}</h2>
    <div class="row g-4 mb-5">
        @forelse($articles as $article)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-image" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text text-muted small">{{ $article->excerpt }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar"></i> {{ $article->created_at->translatedFormat('d F Y') }}
                        </small>
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.read_more') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.No articles found for your search.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($articles->hasPages())
        <div class="d-flex justify-content-center mb-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @endif
    
    <!-- News Results -->
    <h2 class="h4 mb-3">{{ __('messages.news') }}</h2>
    <div class="row g-4 mb-5">
        @forelse($news as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($item->featured_image)
                        <img src="{{ asset('storage/' . $item->featured_image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-image" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar"></i> {{ $item->created_at->translatedFormat('d F Y') }}
                        </small>
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.read_more') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.No news found for your search.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($news->hasPages())
        <div class="d-flex justify-content-center mb-5">
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    @endif
    
    <!-- Events Results -->
    @if($events->count() > 0)
        <h2 class="h4 mb-3">{{ __('messages.events') }}</h2>
        <div class="row g-4 mb-5">
            @foreach($events as $event)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        @if($event->featured_image)
                            <img src="{{ asset('storage/' . $event->featured_image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-calendar-event" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit(strip_tags($event->description), 100) }}</p>
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $event->start_date->translatedFormat('d F Y') }}
                            </small>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Galleries Results -->
    @if($galleries->count() > 0)
        <h2 class="h4 mb-3">{{ __('messages.Galleries') }}</h2>
        <div class="row g-4 mb-5">
            @foreach($galleries as $gallery)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        @if($gallery->images && $gallery->images->count() > 0)
                            <img src="{{ asset('storage/' . $gallery->images->first()->image_url) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-images" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $gallery->title }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($gallery->description, 100) }}</p>
                            <small class="text-muted">
                                <i class="bi bi-images"></i> {{ $gallery->images ? $gallery->images->count() : 0 }} {{ __('messages.Images') }}
                            </small>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
    @if($articles->count() === 0 && $news->count() === 0 && $services->count() === 0 && $departments->count() === 0 && $officials->count() === 0 && $events->count() === 0 && $galleries->count() === 0)
        <div class="alert alert-warning">
            {{ __('messages.No results found for your search. Please try different keywords.') }}
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('title', __('messages.home'))

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container-lg">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>{{ __('messages.welcome_title') }}</h1>
                <p class="lead mb-4">{{ __('messages.welcome_subtitle') }}</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary btn-lg">{{ __('messages.browse_content') }}</a>
                    <a href="{{ route('events.index') }}" class="btn btn-outline-light btn-lg">{{ __('messages.view_events') }}</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="bi bi-building" style="font-size: 10rem; color: rgba(255, 255, 255, 0.3);"></i>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container-lg">
        <h2 class="text-center mb-5">{{ __('messages.our_services') }}</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-file-text" style="font-size: 2rem; color: var(--primary);"></i>
                    </div>
                    <h5>{{ __('messages.articles_info') }}</h5>
                    <p class="text-muted small">{{ __('messages.articles_info_desc') }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-calendar-event" style="font-size: 2rem; color: var(--primary);"></i>
                    </div>
                    <h5>{{ __('messages.events') }}</h5>
                    <p class="text-muted small">{{ __('messages.events_desc') }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-inbox" style="font-size: 2rem; color: var(--primary);"></i>
                    </div>
                    <h5>{{ __('messages.submit_request') }}</h5>
                    <p class="text-muted small">{{ __('messages.submit_request_desc') }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-telephone" style="font-size: 2rem; color: var(--primary);"></i>
                    </div>
                    <h5>{{ __('messages.directory') }}</h5>
                    <p class="text-muted small">{{ __('messages.directory_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles -->
<section class="py-5 bg-light">
    <div class="container-lg">
        <h2 class="mb-5">{{ __('messages.latest_articles') }}</h2>
        <div class="row g-4">
            @forelse($recentArticles as $article)
                <div class="col-md-4">
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
                            <small class="text-muted">{{ $article->created_at->translatedFormat('d F Y') }}</small>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.read_more') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">{{ __('messages.no_articles') }}</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('articles.index') }}" class="btn btn-primary">{{ __('messages.view_all_articles') }}</a>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-5">
    <div class="container-lg">
        <h2 class="mb-5">{{ __('messages.upcoming_events') }}</h2>
        <div class="row g-4">
            @forelse($upcomingEvents as $event)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="bg-primary text-white rounded p-3 text-center">
                                        <div class="h4 mb-0">{{ $event->start_date ? $event->start_date->format('d') : 'N/A' }}</div>
                                        <small>{{ $event->start_date ? $event->start_date->format('M') : 'N/A' }}</small>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $event->title_fr ?? $event->title_en ?? 'N/A' }}</h5>
                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-geo-alt"></i> {{ $event->location ?? 'N/A' }}
                                    </p>
                                    <p class="small">{{ Str::limit($event->description_fr ?? $event->description_en ?? 'N/A', 80) }}</p>
                                    <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">{{ __('messages.no_events') }}</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('events.index') }}" class="btn btn-primary">{{ __('messages.view_all_events') }}</a>
        </div>
    </div>
</section>

<!-- Latest News -->
@if($recentNews->count() > 0)
<section class="py-5">
    <div class="container-lg">
        <h2 class="mb-5">{{ __('messages.news') }}</h2>
        <div class="row g-4">
            @foreach($recentNews->take(3) as $newsItem)
                <div class="col-md-4">
                    <div class="card h-100">
                        @if($newsItem->featured_image)
                            <img src="{{ asset('storage/' . $newsItem->featured_image) }}" class="card-img-top" alt="{{ $newsItem->title }}" style="height: 180px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 180px;">
                                <i class="bi bi-newspaper" style="font-size: 2rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($newsItem->title, 50) }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit(strip_tags($newsItem->content), 80) }}</p>
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-calendar"></i> {{ $newsItem->published_at->translatedFormat('d F Y') }}
                            </small>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.read_more') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-outline-primary">{{ __('messages.view_all') }}</a>
        </div>
    </div>
</section>
@endif

<!-- Quick Stats -->
<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-file-text" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h3 class="mb-2">{{ $recentArticles->count() }}</h3>
                <p class="text-muted">{{ __('messages.articles_published') }}</p>
                <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline-primary mt-2">{{ __('messages.view_all') }}</a>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-calendar-event" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h3 class="mb-2">{{ $upcomingEvents->count() }}</h3>
                <p class="text-muted">{{ __('messages.events_organized') }}</p>
                <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-primary mt-2">{{ __('messages.view_all') }}</a>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <i class="bi bi-newspaper" style="font-size: 2rem; color: var(--primary);"></i>
                </div>
                <h3 class="mb-2">{{ $recentNews->count() }}</h3>
                <p class="text-muted">{{ __('messages.news') }}</p>
                @if($recentNews->count() > 0)
                    <a href="{{ route('news.index') }}" class="btn btn-sm btn-outline-primary mt-2">{{ __('messages.view_all') }}</a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, rgba(30, 64, 175, 0.85) 0%, rgba(15, 23, 42, 0.9) 100%), url('{{ asset('Flag-Tunisia.png') }}'); background-size: cover; background-position: center; color: white;">
    <div class="container-lg text-center">
        <h2 class="mb-3">{{ __('messages.need_help') }}</h2>
        <p class="lead mb-4">{{ __('messages.need_help_desc') }}</p>
        <a href="{{ route('services.contact') }}" class="btn btn-light btn-lg">{{ __('messages.get_support') }}</a>
    </div>
</section>
@endsection

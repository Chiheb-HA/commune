@extends('layouts.app')

@section('title', $newsItem->title)

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-lg-8">
            @if($newsItem->featured_image)
                <img src="{{ asset('storage/' . $newsItem->featured_image) }}" class="img-fluid mb-4 rounded" alt="{{ $newsItem->title }}">
            @endif
            
            <h1 class="mb-3">{{ $newsItem->title }}</h1>
            
            <div class="mb-4 text-muted">
                <small>
                    <i class="bi bi-calendar"></i> {{ $newsItem->published_at->translatedFormat('d F Y') }}
                    @if($newsItem->author)
                        <span class="mx-2">|</span>
                        <i class="bi bi-person"></i> {{ $newsItem->author->name }}
                    @endif
                    <span class="mx-2">|</span>
                    <i class="bi bi-eye"></i> {{ $newsItem->views_count }} {{ __('messages.Views') }}
                    <span class="mx-2">|</span>
                    <i class="bi bi-share"></i> {{ $newsItem->shares_count }} {{ __('messages.Shares') }}
                </small>
            </div>
            
            <div class="content mb-4">
                {!! $newsItem->content !!}
            </div>

            @if($newsItem->tags)
                <p class="text-muted"><strong>{{ __('messages.Tags') }}:</strong> {{ $newsItem->tags }}</p>
            @endif

            <div class="mt-4 pt-4 border-top">
                <h6 class="mb-3">{{ __('Share this article:') }}</h6>
                <div class="d-flex gap-2">
                    <a href="{{ route('news.share', [$newsItem->slug, 'facebook']) }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-facebook"></i> Facebook</a>
                    <a href="{{ route('news.share', [$newsItem->slug, 'x']) }}" class="btn btn-sm btn-outline-info" target="_blank"><i class="bi bi-twitter"></i> X</a>
                    <a href="{{ route('news.share', [$newsItem->slug, 'email']) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-envelope"></i> Email</a>
                </div>
            </div>
            
            <div class="mt-4 pt-4 border-top">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> {{ __('messages.back') }}
                </a>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('messages.latest_articles') }}</h6>
                </div>
                <div class="card-body">
                    @php
                        $recentNews = \App\Models\News::published()
                            ->where('id', '!=', $newsItem->id)
                            ->latest('published_at')
                            ->limit(5)
                            ->get();
                    @endphp
                    @forelse($recentNews as $recent)
                        <div class="mb-3">
                            <a href="{{ route('news.show', $recent->slug) }}" class="text-decoration-none">
                                <h6 class="mb-1">{{ $recent->title }}</h6>
                                <small class="text-muted">{{ $recent->published_at->translatedFormat('d F Y') }}</small>
                            </a>
                        </div>
                    @empty
                        <p class="text-muted small">{{ __('messages.no_news') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

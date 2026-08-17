@extends('layouts.app')

@section('title', __('Search'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('Search Results') }}</h1>
    
    @if($query)
        <p class="mb-4 text-muted">{{ __('Search query: :query', ['query' => $query]) }}</p>
    @endif
    
    <h2 class="h4 mb-3">{{ __('Articles') }}</h2>
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
                        <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-primary">{{ __('Read More') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('No articles found for your search.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($articles->hasPages())
        <div class="d-flex justify-content-center mb-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @endif
    
    <h2 class="h4 mb-3">{{ __('News') }}</h2>
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
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-sm btn-primary">{{ __('Read More') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('No news found for your search.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($news->hasPages())
        <div class="d-flex justify-content-center mb-5">
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    @endif
    
    @if($articles->count() === 0 && $news->count() === 0)
        <div class="alert alert-warning">
            {{ __('No results found for your search. Please try different keywords.') }}
        </div>
    @endif
</div>
@endsection

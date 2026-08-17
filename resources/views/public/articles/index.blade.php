@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('Articles') }}</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="{{ __('Search articles...') }}" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
            </form>
        </div>
    </div>
    
    <div class="row g-4">
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
                    {{ __('No articles found.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($articles->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

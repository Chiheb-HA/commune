@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container-lg py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">{{ __('Articles') }}</a></li>
            <li class="breadcrumb-item active">{{ $article->title }}</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Article Header -->
            <article>
                <header class="mb-4">
                    <h1 class="mb-3">{{ $article->title }}</h1>
                    <div class="d-flex gap-3 align-items-center text-muted mb-4">
                        <span>
                            <i class="bi bi-calendar"></i>
                            {{ $article->created_at->translatedFormat('d F Y') }}
                        </span>
                    </div>
                </header>
                
                @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">
                @endif
                
                @if($article->excerpt)
                    <blockquote class="blockquote mb-4">
                        {{ $article->excerpt }}
                    </blockquote>
                @endif
                
                <div class="content mb-5">
                    {!! $article->content !!}
                </div>
                
                <!-- Share -->
                <div class="border-top pt-4">
                    <h6 class="mb-3">{{ __('Share this article:') }}</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('articles.show', $article->slug)) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('articles.show', $article->slug)) }}&text={{ urlencode($article->title) }}" class="btn btn-sm btn-outline-info" target="_blank">
                            <i class="bi bi-twitter"></i> Twitter
                        </a>
                        <a href="mailto:?subject={{ urlencode($article->title) }}&body={{ urlencode(route('articles.show', $article->slug)) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-envelope"></i> Email
                        </a>
                    </div>
                </div>
            </article>
            
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Related Articles -->
            @if($relatedArticles->count())
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Related Articles') }}</h6>
                    </div>
                    <div class="card-body">
                        @foreach($relatedArticles as $related)
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="mb-1">
                                    <a href="{{ route('articles.show', $related->slug) }}" class="text-decoration-none">
                                        {{ $related->title }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $related->created_at->translatedFormat('d F Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

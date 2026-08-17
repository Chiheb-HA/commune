@extends('layouts.app')

@section('title', __('messages.news'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.news') }}</h1>
    
    <div class="row g-4">
        @forelse($news as $newsItem)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($newsItem->featured_image)
                        <img src="{{ asset('storage/' . $newsItem->featured_image) }}" class="card-img-top" alt="{{ $newsItem->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-newspaper" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $newsItem->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit(strip_tags($newsItem->content), 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted d-block mb-2">
                            <i class="bi bi-calendar"></i> {{ $newsItem->published_at->translatedFormat('d F Y') }}
                        </small>
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="btn btn-sm btn-primary">{{ __('messages.read_more') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.no_news') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($news->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

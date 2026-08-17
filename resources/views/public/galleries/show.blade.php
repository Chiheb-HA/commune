@extends('layouts.app')

@section('title', $gallery->title)

@section('content')
<div class="container-lg py-5">
    <div class="mb-4">
        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> {{ __('messages.back') }}
        </a>
    </div>
    
    <h1 class="mb-3">{{ $gallery->title }}</h1>
    <p class="lead mb-4">{{ $gallery->description }}</p>
    
    @if($gallery->images->count() > 0)
        <div class="row g-3">
            @foreach($gallery->images as $image)
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="gallery" data-title="{{ $image->caption ?? $gallery->title }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="{{ $image->caption ?? $gallery->title }}" style="height: 200px; object-fit: cover; cursor: pointer;">
                        </a>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted text-truncate" style="max-width: 70%;">{{ $image->caption ?? '' }}</small>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-share"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('galleries.show', $gallery->id)) }}" target="_blank">
                                                <i class="bi bi-facebook"></i> Facebook
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ urlencode(route('galleries.show', $gallery->id)) }}&text={{ urlencode($gallery->title) }}" target="_blank">
                                                <i class="bi bi-twitter"></i> Twitter
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="https://wa.me/?text={{ urlencode($gallery->title . ' ' . route('galleries.show', $gallery->id)) }}" target="_blank">
                                                <i class="bi bi-whatsapp"></i> WhatsApp
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            {{ __('messages.No galleries found.') }}
        </div>
    @endif
</div>

@section('extra-js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endsection

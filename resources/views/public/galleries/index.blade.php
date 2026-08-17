@extends('layouts.app')

@section('title', __('messages.Galleries'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Galleries') }}</h1>
    
    <div class="row g-4">
        @forelse($galleries as $gallery)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($gallery->images->count() > 0)
                        <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-images" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($gallery->description, 80) }}</p>
                        <small class="text-muted">
                            <i class="bi bi-image"></i> {{ $gallery->images->count() }} {{ __('messages.Images') }}
                        </small>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.No galleries found.') }}
                </div>
            </div>
        @endforelse
    </div>
    
    @if($galleries->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection

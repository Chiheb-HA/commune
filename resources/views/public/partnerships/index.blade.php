@extends('layouts.app')

@section('title', __('messages.Partnerships'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Partnerships') }}</h1>
    <p class="lead text-muted mb-5">{{ __('messages.Our partnerships and twinning agreements') }}</p>

    <div class="row g-4">
        @forelse($partnerships as $partnership)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if($partnership->image)
                        <img src="{{ asset('storage/' . $partnership->image) }}" class="card-img-top" alt="{{ $partnership->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-handshake" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $partnership->title }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($partnership->description, 100) }}</p>
                        @if($partnership->partner_country || $partnership->partner_city)
                            <div class="mb-2">
                                @if($partnership->partner_country)
                                    <span class="badge bg-light text-dark"><i class="bi bi-geo-alt"></i> {{ $partnership->partner_country }}</span>
                                @endif
                                @if($partnership->partner_city)
                                    <span class="badge bg-light text-dark"><i class="bi bi-building"></i> {{ $partnership->partner_city }}</span>
                                @endif
                            </div>
                        @endif
                        @if($partnership->signed_date)
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $partnership->signed_date->format('d/m/Y') }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.No partnerships available at the moment.') }}
                </div>
            </div>
        @endforelse
    </div>

    @if($partnerships->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $partnerships->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
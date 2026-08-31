@extends('layouts.app')

@section('title', __('messages.municipal_services'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-2">{{ __('messages.municipal_services') }}</h1>
    <p class="lead text-muted mb-4">{{ __('messages.services_description') }}</p>

    {{-- Search form --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('services.index') }}" class="row g-2">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control" placeholder="{{ __('messages.search_services') }}" value="{{ $search ?? '' }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> {{ __('messages.search') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @forelse($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            @if($service->icon)
                                <i class="{{ $service->icon }}" style="font-size: 2rem; color: var(--primary);"></i>
                            @else
                                <i class="bi bi-file-earmark-text" style="font-size: 2rem; color: var(--primary);"></i>
                            @endif
                        </div>
                        <h5 class="card-title">{{ $service->getTranslatableContent('name') }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($service->getTranslatableContent('description'), 120) }}</p>

                        @if($service->processing_time)
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ __('messages.processing_time') }}: {{ $service->processing_time }}
                                </small>
                            </div>
                        @endif

                        @if($service->cost)
                            <div class="mt-1">
                                <small class="text-muted">
                                    <i class="bi bi-cash"></i> {{ __('messages.cost') }}: {{ $service->cost }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-sm btn-primary w-100">
                            <i class="bi bi-file-earmark-medical"></i> {{ __('messages.view_documents') }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.no_services_available') }}
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

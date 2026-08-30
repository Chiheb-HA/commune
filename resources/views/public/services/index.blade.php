@extends('layouts.app')

@section('title', __('messages.services'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.municipal_services') }}</h1>
    <p class="lead mb-5">{{ __('messages.services_description') }}</p>
    
    <div class="row g-4">
        @forelse($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="mb-3">
                            @if($service->icon)
                                <i class="{{ $service->icon }}" style="font-size: 2rem; color: var(--primary);"></i>
                            @else
                                <i class="bi bi-building" style="font-size: 2rem; color: var(--primary);"></i>
                            @endif
                        </div>
                        <h5 class="card-title">{{ $service->getTranslatableContent('name') }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($service->getTranslatableContent('description'), 150) }}</p>
                        
                        @if($service->getTranslatableContent('documents_required'))
                            <div class="mt-3">
                                <strong>{{ __('messages.documents_required') }}:</strong>
                                <p class="small text-muted mb-0">{{ $service->getTranslatableContent('documents_required') }}</p>
                            </div>
                        @endif
                        
                        @if($service->processing_time)
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ __('messages.processing_time') }}: {{ $service->processing_time }}
                                </small>
                            </div>
                        @endif
                        
                        @if($service->cost)
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-currency-dollar"></i> {{ __('messages.cost') }}: {{ $service->cost }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent">
                        @if($service->phone || $service->email)
                            <div class="small text-muted mb-2">
                                @if($service->phone)
                                    <div><i class="bi bi-telephone"></i> {{ $service->phone }}</div>
                                @endif
                                @if($service->email)
                                    <div><i class="bi bi-envelope"></i> {{ $service->email }}</div>
                                @endif
                            </div>
                        @endif
                        <a href="{{ route('services.contact') }}" class="btn btn-sm btn-primary">{{ __('messages.contact_service') }}</a>
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

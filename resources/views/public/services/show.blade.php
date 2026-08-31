@extends('layouts.app')

@section('title', $service->getTranslatableContent('name'))

@section('content')
<div class="container-lg py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">{{ __('messages.municipal_services') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $service->getTranslatableContent('name') }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3">
                            @if($service->icon)
                                <i class="{{ $service->icon }}" style="font-size: 2.5rem; color: var(--primary);"></i>
                            @else
                                <i class="bi bi-file-earmark-text" style="font-size: 2.5rem; color: var(--primary);"></i>
                            @endif
                        </div>
                        <div>
                            <h1 class="h2 mb-1">{{ $service->getTranslatableContent('name') }}</h1>
                            <span class="badge bg-primary">{{ __('messages.authorization') }}</span>
                        </div>
                    </div>
                    @if($service->getTranslatableContent('description'))
                        <section class="mb-4">
                            <h3 class="h5 mb-3"><i class="bi bi-info-circle text-primary"></i> {{ __('messages.description') }}</h3>
                            <p class="text-muted">{{ $service->getTranslatableContent('description') }}</p>
                        </section>
                    @endif

                    @if($service->getTranslatableContent('documents_required'))
                        <section class="mb-4">
                            <h3 class="h5 mb-3"><i class="bi bi-file-earmark-medical text-primary"></i> {{ __('messages.documents_required') }}</h3>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($service->getTranslatableContent('documents_required'))) !!}
                            </div>
                        </section>
                    @endif

                    @if($service->getTranslatableContent('requirements'))
                        <section class="mb-4">
                            <h3 class="h5 mb-3"><i class="bi bi-list-check text-primary"></i> {{ __('messages.requirements') }}</h3>
                            <div class="bg-light rounded p-3">
                                {!! nl2br(e($service->getTranslatableContent('requirements'))) !!}
                            </div>
                        </section>
                    @endif

                    <div class="d-flex flex-wrap gap-2 mt-4">
                        @if(Route::has('login'))
                            @auth
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> {{ __('messages.submit_request') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i> {{ __('messages.login_to_request') }}
                                </a>
                            @endauth
                        @endif
                        <a href="{{ route('services.contact') }}" class="btn btn-outline-primary">
                            <i class="bi bi-telephone"></i> {{ __('messages.contact_service') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h3 class="h6 mb-3">{{ __('messages.quick_info') }}</h3>
                    @if($service->processing_time)
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-clock text-primary me-2 mt-1"></i>
                            <div>
                                <small class="text-muted d-block">{{ __('messages.processing_time') }}</small>
                                <strong>{{ $service->processing_time }}</strong>
                            </div>
                        </div>
                    @endif
                    @if($service->cost)
                        <div class="d-flex align-items-start">
                            <i class="bi bi-cash text-primary me-2 mt-1"></i>
                            <div>
                                <small class="text-muted d-block">{{ __('messages.cost') }}</small>
                                <strong>{{ $service->cost }}</strong>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if($service->phone || $service->email)
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 mb-3">{{ __('messages.contact_information') }}</h3>
                        @if($service->phone)
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <a href="tel:{{ $service->phone }}" class="text-decoration-none">{{ $service->phone }}</a>
                            </div>
                        @endif
                        @if($service->email)
                            <div class="d-flex align-items-center">
                                <i class="bi bi-envelope text-primary me-2"></i>
                                <a href="mailto:{{ $service->email }}" class="text-decoration-none">{{ $service->email }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
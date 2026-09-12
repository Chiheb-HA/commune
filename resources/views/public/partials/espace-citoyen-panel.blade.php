<!-- Espace Citoyen Panel Partial -->
<section class="py-5 bg-light border-bottom border-top">
    <div class="container-lg">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h3 mb-1 text-primary">
                    <i class="bi bi-person-workspace me-2"></i>{{ __('messages.espace_citoyen_title') }}
                </h2>
                <p class="text-muted mb-0">{{ __('messages.espace_citoyen_subtitle') }}</p>
            </div>
            @auth
                @if(auth()->user()->hasRole('citizen'))
                    <a href="{{ route('citizen.dashboard') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-speedometer2 me-1"></i>{{ __('messages.my_space') }}
                    </a>
                @endif
            @endauth
        </div>

        <div class="row g-4">
            <!-- Services Link & Count -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3 hover-lift">
                    <div class="card-body">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-grid-3x3-gap-fill fs-3"></i>
                        </div>
                        <h5 class="card-title h6 fw-bold mb-2">{{ __('messages.municipal_services') }}</h5>
                        <p class="text-muted small mb-3">{{ __('messages.espace_citoyen_services_desc') }}</p>
                        <div class="mb-3">
                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                {{ $espaceCitoyenStats['total_services'] ?? 0 }} {{ __('messages.active_services_count') }}
                            </span>
                        </div>
                        <a href="{{ route('services.index') }}" class="btn btn-sm btn-outline-primary w-100">
                            {{ __('messages.browse_services') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Requests Tracking Link & Count -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3 hover-lift">
                    <div class="card-body">
                        <div class="rounded-circle bg-info bg-opacity-10 text-info d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-inbox-fill fs-3"></i>
                        </div>
                        <h5 class="card-title h6 fw-bold mb-2">{{ __('messages.request_tracking') }}</h5>
                        <p class="text-muted small mb-3">{{ __('messages.espace_citoyen_requests_desc') }}</p>
                        <div class="mb-3">
                            <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                                {{ $espaceCitoyenStats['total_requests_month'] ?? 0 }} {{ __('messages.requests_this_month') }}
                            </span>
                        </div>
                        <a href="{{ route('request-tracking.index') }}" class="btn btn-sm btn-outline-info w-100">
                            {{ __('messages.track_request') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Complaints Tracking Link & Count -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3 hover-lift">
                    <div class="card-body">
                        <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                        </div>
                        <h5 class="card-title h6 fw-bold mb-2">{{ __('messages.file_complaint') }}</h5>
                        <p class="text-muted small mb-3">{{ __('messages.espace_citoyen_complaints_desc') }}</p>
                        <div class="mb-3">
                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                {{ $espaceCitoyenStats['total_complaints_month'] ?? 0 }} {{ __('messages.complaints_this_month') }}
                            </span>
                        </div>
                        <a href="{{ route('services.complaint') }}" class="btn btn-sm btn-outline-warning w-100">
                            {{ __('messages.file_complaint') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Associations Link -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-3 hover-lift">
                    <div class="card-body">
                        <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <h5 class="card-title h6 fw-bold mb-2">{{ __('messages.associations') }}</h5>
                        <p class="text-muted small mb-3">{{ __('messages.espace_citoyen_associations_desc') }}</p>
                        <div class="mb-3">
                            <span class="badge bg-success rounded-pill px-3 py-2">
                                <i class="bi bi-heart-fill me-1"></i>{{ __('messages.civil_society') }}
                            </span>
                        </div>
                        <a href="{{ route('associations.index') }}" class="btn btn-sm btn-outline-success w-100">
                            {{ __('messages.view_associations') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

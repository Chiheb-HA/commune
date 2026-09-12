@extends('layouts.app')

@section('title', __('messages.permit_committee_meetings'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 mb-1"><i class="bi bi-building-check me-2"></i>{{ __('messages.permit_committee_meetings') }}</h1>
            <p class="text-muted mb-0">{{ __('messages.permit_committee_meetings_desc') }}</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($meetings as $meeting)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded p-3 text-center me-3" style="min-width: 65px;">
                                <div class="h4 mb-0 fw-bold">{{ $meeting->meeting_date->format('d') }}</div>
                                <small class="text-uppercase">{{ $meeting->meeting_date->translatedFormat('M') }}</small>
                            </div>
                            <div>
                                <h5 class="card-title h6 mb-1 text-primary">
                                    {{ $meeting->meeting_date->translatedFormat('l, d F Y') }}
                                </h5>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $meeting->meeting_date->format('H:i') }}
                                </small>
                            </div>
                        </div>

                        @if($meeting->location)
                            <p class="small text-secondary mb-2">
                                <i class="bi bi-geo-alt-fill me-1 text-danger"></i><strong>{{ __('messages.location') }}:</strong> {{ $meeting->location }}
                            </p>
                        @endif

                        @php
                            $agenda = $meeting->getTranslatableContent('agenda') ?? $meeting->agenda_fr ?? $meeting->agenda_en ?? $meeting->agenda_ar;
                        @endphp

                        @if($agenda)
                            <div class="mt-3 pt-3 border-top">
                                <h6 class="small fw-bold text-dark mb-1"><i class="bi bi-journal-text me-1"></i>{{ __('messages.agenda') }}:</h6>
                                <p class="small text-muted mb-0 text-break">{{ $agenda }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-light border-top-0 d-flex justify-content-between align-items-center">
                        <span class="badge bg-info text-dark">{{ __('messages.building_permit_committee') }}</span>
                        <small class="text-muted">{{ $meeting->meeting_date->isFuture() ? __('messages.upcoming') : __('messages.held') }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 bg-white rounded shadow-sm">
                    <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3 mb-0">{{ __('messages.no_permit_committee_meetings') }}</p>
                </div>
            </div>
        @endforelse
    </div>

    @if($meetings->hasPages())
        <div class="mt-4">
            {{ $meetings->links() }}
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('title', __('messages.facility_reservations'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 mb-1"><i class="bi bi-calendar-plus me-2"></i>{{ __('messages.facility_reservations') }}</h1>
            <p class="text-muted mb-0">{{ __('messages.facility_reservations_desc') }}</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Reservation Form -->
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0"><i class="bi bi-pencil-square me-2"></i>{{ __('messages.book_facility') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('facility-reservations.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="facility_type" class="form-label">{{ __('messages.facility_type') }} <span class="text-danger">*</span></label>
                            <select name="facility_type" id="facility_type" class="form-select @error('facility_type') is-invalid @enderror" required>
                                <option value="">{{ __('messages.select_facility') }}</option>
                                <option value="salle_des_fetes" {{ old('facility_type') === 'salle_des_fetes' ? 'selected' : '' }}>{{ __('messages.facility_salle_des_fetes') }}</option>
                                <option value="souk" {{ old('facility_type') === 'souk' ? 'selected' : '' }}>{{ __('messages.facility_souk') }}</option>
                            </select>
                            @error('facility_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="citizen_name" class="form-label">{{ __('messages.citizen_name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="citizen_name" id="citizen_name" class="form-control @error('citizen_name') is-invalid @enderror" value="{{ old('citizen_name', auth()->user()->name ?? '') }}" required>
                                @error('citizen_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="citizen_phone" class="form-label">{{ __('messages.citizen_phone') }} <span class="text-danger">*</span></label>
                                <input type="text" name="citizen_phone" id="citizen_phone" class="form-control @error('citizen_phone') is-invalid @enderror" value="{{ old('citizen_phone', auth()->user()->phone ?? '') }}" required>
                                @error('citizen_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="citizen_email" class="form-label">{{ __('messages.citizen_email') }}</label>
                                <input type="email" name="citizen_email" id="citizen_email" class="form-control @error('citizen_email') is-invalid @enderror" value="{{ old('citizen_email', auth()->user()->email ?? '') }}">
                                @error('citizen_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="requested_date" class="form-label">{{ __('messages.requested_date') }} <span class="text-danger">*</span></label>
                                <input type="date" name="requested_date" id="requested_date" class="form-control @error('requested_date') is-invalid @enderror" value="{{ old('requested_date') }}" min="{{ date('Y-m-d') }}" required>
                                @error('requested_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">{{ __('messages.notes') }}</label>
                            <textarea name="notes" id="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send me-1"></i> {{ __('messages.submit_reservation') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- My Reservations List (if logged in) -->
        <div class="col-lg-5">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-secondary text-white">
                    <h3 class="h5 mb-0"><i class="bi bi-list-check me-2"></i>{{ __('messages.my_reservations') }}</h3>
                </div>
                <div class="card-body">
                    @auth
                        @forelse($myReservations as $res)
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h4 class="h6 mb-0 text-primary">
                                        {{ $res->facility_type === 'salle_des_fetes' ? __('messages.facility_salle_des_fetes') : __('messages.facility_souk') }}
                                    </h4>
                                    @if($res->status === 'approved')
                                        <span class="badge bg-success">{{ __('messages.status_approved') }}</span>
                                    @elseif($res->status === 'rejected')
                                        <span class="badge bg-danger">{{ __('messages.status_rejected') }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                                    @endif
                                </div>
                                <div class="small text-muted mb-1">
                                    <i class="bi bi-calendar3 me-1"></i>{{ __('messages.date') }}: {{ $res->requested_date->translatedFormat('d F Y') }}
                                </div>
                                @if($res->notes)
                                    <p class="small text-muted mb-0">{{ Str::limit($res->notes, 60) }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted text-center py-4 mb-0">{{ __('messages.no_reservations_yet') }}</p>
                        @endforelse
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-lock text-muted" style="font-size: 2.5rem;"></i>
                            <p class="text-muted small mt-2 mb-3">{{ __('messages.login_to_see_reservations') }}</p>
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">{{ __('messages.login') }}</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

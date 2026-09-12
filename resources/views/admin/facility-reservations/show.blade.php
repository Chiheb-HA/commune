@extends('layouts.admin')

@section('title', __('messages.reservation_details'))

@section('page-title', __('messages.reservation_details'))

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.facility-reservations.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> {{ __('messages.back_to_list') }}
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">
                {{ __('messages.reservation_details') }} #{{ $reservation->id }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">{{ __('messages.facility_type') }}</dt>
                    <dd class="col-sm-8">
                        <strong>{{ $reservation->facility_type === 'salle_des_fetes' ? __('messages.facility_salle_des_fetes') : __('messages.facility_souk') }}</strong>
                    </dd>

                    <dt class="col-sm-4">{{ __('messages.citizen_name') }}</dt>
                    <dd class="col-sm-8">{{ $reservation->citizen_name }}</dd>

                    <dt class="col-sm-4">{{ __('messages.citizen_phone') }}</dt>
                    <dd class="col-sm-8"><a href="tel:{{ $reservation->citizen_phone }}">{{ $reservation->citizen_phone }}</a></dd>

                    @if($reservation->citizen_email)
                        <dt class="col-sm-4">{{ __('messages.citizen_email') }}</dt>
                        <dd class="col-sm-8"><a href="mailto:{{ $reservation->citizen_email }}">{{ $reservation->citizen_email }}</a></dd>
                    @endif

                    <dt class="col-sm-4">{{ __('messages.requested_date') }}</dt>
                    <dd class="col-sm-8"><strong>{{ $reservation->requested_date->translatedFormat('d F Y') }}</strong></dd>

                    <dt class="col-sm-4">{{ __('messages.status') }}</dt>
                    <dd class="col-sm-8">
                        @if($reservation->status === 'approved')
                            <span class="badge bg-success">{{ __('messages.status_approved') }}</span>
                        @elseif($reservation->status === 'rejected')
                            <span class="badge bg-danger">{{ __('messages.status_rejected') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                        @endif
                    </dd>

                    @if($reservation->notes)
                        <dt class="col-sm-4">{{ __('messages.notes') }}</dt>
                        <dd class="col-sm-8"><p class="mb-0 text-break">{{ $reservation->notes }}</p></dd>
                    @endif

                    <dt class="col-sm-4">{{ __('messages.created_at') }}</dt>
                    <dd class="col-sm-8">{{ $reservation->created_at->translatedFormat('d F Y, H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-check-circle-fill me-1"></i> {{ __('messages.process_reservation') }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.facility-reservations.update', $reservation) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label">{{ __('messages.status') }}</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ old('status', $reservation->status) === 'pending' ? 'selected' : '' }}>{{ __('messages.status_pending') }}</option>
                            <option value="approved" {{ old('status', $reservation->status) === 'approved' ? 'selected' : '' }}>{{ __('messages.status_approved') }}</option>
                            <option value="rejected" {{ old('status', $reservation->status) === 'rejected' ? 'selected' : '' }}>{{ __('messages.status_rejected') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">{{ __('messages.admin_notes') }}</label>
                        <textarea name="notes" id="notes" rows="4" class="form-control">{{ old('notes', $reservation->notes) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> {{ __('messages.save_status') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

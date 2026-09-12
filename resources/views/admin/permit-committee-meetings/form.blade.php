@extends('layouts.admin')

@section('title', isset($meeting) ? __('messages.edit_permit_committee_meeting') : __('messages.new_permit_committee_meeting'))

@section('page-title', isset($meeting) ? __('messages.edit_permit_committee_meeting') : __('messages.new_permit_committee_meeting'))

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.permit-committee-meetings.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> {{ __('messages.back_to_list') }}
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white fw-bold">
        {{ isset($meeting) ? __('messages.edit_permit_committee_meeting') : __('messages.new_permit_committee_meeting') }}
    </div>
    <div class="card-body">
        <form action="{{ isset($meeting) ? route('admin.permit-committee-meetings.update', $meeting) : route('admin.permit-committee-meetings.store') }}" method="POST">
            @csrf
            @if(isset($meeting))
                @method('PUT')
            @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="meeting_date" class="form-label">{{ __('messages.meeting_date') }} <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="meeting_date" id="meeting_date" class="form-control @error('meeting_date') is-invalid @enderror" value="{{ old('meeting_date', isset($meeting) ? $meeting->meeting_date->format('Y-m-d\TH:i') : '') }}" required>
                    @error('meeting_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label">{{ __('messages.location') }}</label>
                    <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $meeting->location ?? '') }}">
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="agenda_fr" class="form-label">{{ __('messages.agenda') }} ({{ __('messages.French') }})</label>
                    <textarea name="agenda_fr" id="agenda_fr" rows="4" class="form-control">{{ old('agenda_fr', $meeting->agenda_fr ?? '') }}</textarea>
                </div>

                <div class="col-md-4">
                    <label for="agenda_en" class="form-label">{{ __('messages.agenda') }} ({{ __('messages.English') }})</label>
                    <textarea name="agenda_en" id="agenda_en" rows="4" class="form-control">{{ old('agenda_en', $meeting->agenda_en ?? '') }}</textarea>
                </div>

                <div class="col-md-4">
                    <label for="agenda_ar" class="form-label">{{ __('messages.agenda') }} ({{ __('messages.Arabic') }})</label>
                    <textarea name="agenda_ar" id="agenda_ar" rows="4" class="form-control">{{ old('agenda_ar', $meeting->agenda_ar ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $meeting->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="is_active">{{ __('messages.active') }}</label>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> {{ __('messages.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

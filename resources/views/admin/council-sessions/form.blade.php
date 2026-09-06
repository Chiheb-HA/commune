@extends('layouts.admin')

@section('page-title', isset($session) ? __('messages.edit_council_session') : __('messages.new_council_session'))
@section('title', isset($session) ? __('messages.edit_council_session') : __('messages.new_council_session'))

@section('content')
<div class="page-header">
    <h1>{{ isset($session) ? __('messages.edit_council_session') : __('messages.new_council_session') }}</h1>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ isset($session) ? route('admin.council-sessions.update', $session) : route('admin.council-sessions.store') }}">
            @csrf
            @if(isset($session)) @method('PUT') @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="title" class="form-label">{{ __('messages.Name') }}</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $session->title ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="session_date" class="form-label">{{ __('messages.session_date') }}</label>
                    <input type="date" id="session_date" name="session_date" class="form-control" value="{{ old('session_date', isset($session) ? $session->session_date->format('Y-m-d') : '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="type" class="form-label">{{ __('messages.type') }}</label>
                    <select id="type" name="type" class="form-select" required>
                        @foreach(['ordinaire', 'extraordinaire'] as $type)
                            <option value="{{ $type }}" @selected(old('type', $session->type ?? '') === $type)>{{ __('messages.council_type_' . $type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">{{ __('messages.Status') }}</label>
                    <select id="status" name="status" class="form-select" required>
                        @foreach(['upcoming', 'held', 'cancelled'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $session->status ?? 'upcoming') === $status)>{{ __('messages.council_status_' . $status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="committee_name" class="form-label">{{ __('messages.committee') }}</label>
                    <input type="text" id="committee_name" name="committee_name" class="form-control" value="{{ old('committee_name', $session->committee_name ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label for="minutes_document" class="form-label">{{ __('messages.minutes_document') }}</label>
                    <input type="file" id="minutes_document" name="minutes_document" class="form-control" accept="application/pdf">
                    @if(isset($session) && $session->minutes_document)
                        <a href="{{ asset('storage/' . $session->minutes_document) }}" target="_blank" rel="noopener" class="small">{{ __('messages.view_minutes') }}</a>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.council-sessions.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
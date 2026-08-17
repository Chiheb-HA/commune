@extends('layouts.admin')

@section('page-title', $event->exists ? 'Edit Event' : 'Create Event')
@section('title', $event->exists ? 'Edit Event' : 'Create Event')

@section('content')
<div class="page-header">
    <h1>{{ $event->exists ? __('Edit Event') : __('Create Event') }}</h1>
    <p class="text-muted">{{ $event->exists ? __('Update event details') : __('Add a new event') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}" method="POST">
            @csrf
            @if($event->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $event->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $event->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $event->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }} *</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="3" required>{{ old('description_fr', $event->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }} *</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="3" required>{{ old('description_en', $event->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }} *</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="3" required>{{ old('description_ar', $event->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="start_date" class="form-label">{{ __('Start Date') }} *</label>
                    <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date ? $event->start_date->format('Y-m-d\TH:i') : '') }}" required>
                    @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="end_date" class="form-label">{{ __('End Date') }}</label>
                    <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '') }}">
                    @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="location" class="form-label">{{ __('Location') }} *</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $event->location ?? '') }}" required>
                    @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $event->capacity ?? '') }}">
                    @error('capacity') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">{{ __('Status') }} *</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" {{ $event->status === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $event->status === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

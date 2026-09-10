@extends('layouts.admin')

@section('page-title', $competition->exists ? 'Edit Competition' : 'Create Competition')
@section('title', $competition->exists ? 'Edit Competition' : 'Create Competition')

@section('content')
<div class="page-header">
    <h1>{{ $competition->exists ? __('Edit Competition') : __('Create Competition') }}</h1>
    <p class="text-muted">{{ $competition->exists ? __('Update competition details') : __('Add a new competition') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $competition->exists ? route('admin.competitions.update', $competition) : route('admin.competitions.store') }}" method="POST">
            @csrf
            @if($competition->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="slug" class="form-label">{{ __('Slug') }}</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $competition->slug ?? '') }}" readonly>
                    <small class="text-muted">{{ __('Auto-generated from title') }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $competition->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $competition->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $competition->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }} *</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="4" required>{{ old('description_fr', $competition->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }} *</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ old('description_en', $competition->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }} *</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $competition->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="start_date" class="form-label">{{ __('Start Date') }} *</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $competition->start_date ?? '') }}" required>
                    @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="end_date" class="form-label">{{ __('End Date') }} *</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $competition->end_date ?? '') }}" required>
                    @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">{{ __('Status') }} *</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="upcoming" {{ ($competition->status ?? '') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="open" {{ ($competition->status ?? '') === 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ ($competition->status ?? '') === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="attachment_path" class="form-label">{{ __('Attachment Path') }}</label>
                    <input type="text" class="form-control" id="attachment_path" name="attachment_path" value="{{ old('attachment_path', $competition->attachment_path ?? '') }}">
                    @error('attachment_path') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="order" class="form-label">{{ __('Order') }}</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $competition->order ?? 0) }}">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select class="form-select" id="is_active" name="is_active">
                        <option value="1" {{ ($competition->is_active ?? true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ !($competition->is_active ?? true) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </select>
                    @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.competitions.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

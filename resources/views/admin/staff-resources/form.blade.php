@extends('layouts.admin')

@section('page-title', $staffResource->exists ? 'Edit Staff Resource' : 'Create Staff Resource')
@section('title', $staffResource->exists ? 'Edit Staff Resource' : 'Create Staff Resource')

@section('content')
<div class="page-header">
    <h1>{{ $staffResource->exists ? __('Edit Staff Resource') : __('Create Staff Resource') }}</h1>
    <p class="text-muted">{{ $staffResource->exists ? __('Update staff resource details') : __('Add a new staff resource') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $staffResource->exists ? route('admin.staff-resources.update', $staffResource) : route('admin.staff-resources.store') }}" method="POST">
            @csrf
            @if($staffResource->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $staffResource->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $staffResource->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $staffResource->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }} *</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="4" required>{{ old('description_fr', $staffResource->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }} *</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ old('description_en', $staffResource->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }} *</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $staffResource->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="type" class="form-label">{{ __('Type') }} *</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="guide" {{ ($staffResource->type ?? '') === 'guide' ? 'selected' : '' }}>Guide</option>
                        <option value="formation" {{ ($staffResource->type ?? '') === 'formation' ? 'selected' : '' }}>Formation</option>
                        <option value="assistance_technique" {{ ($staffResource->type ?? '') === 'assistance_technique' ? 'selected' : '' }}>Assistance Technique</option>
                    </select>
                    @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="file_path" class="form-label">{{ __('File Path') }}</label>
                    <input type="text" class="form-control" id="file_path" name="file_path" value="{{ old('file_path', $staffResource->file_path ?? '') }}">
                    @error('file_path') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="external_link" class="form-label">{{ __('External Link') }}</label>
                    <input type="text" class="form-control" id="external_link" name="external_link" value="{{ old('external_link', $staffResource->external_link ?? '') }}">
                    @error('external_link') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="order" class="form-label">{{ __('Order') }}</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $staffResource->order ?? 0) }}">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select class="form-select" id="is_active" name="is_active">
                        <option value="1" {{ ($staffResource->is_active ?? true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ !($staffResource->is_active ?? true) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </select>
                    @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.staff-resources.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
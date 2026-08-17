@extends('layouts.admin')

@section('page-title', $gallery->exists ? 'Edit Gallery' : 'Create Gallery')
@section('title', $gallery->exists ? 'Edit Gallery' : 'Create Gallery')

@section('content')
<div class="page-header">
    <h1>{{ $gallery->exists ? __('Edit Gallery') : __('Create Gallery') }}</h1>
    <p class="text-muted">{{ $gallery->exists ? __('Update gallery details') : __('Add a new gallery') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $gallery->exists ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" method="POST">
            @csrf
            @if($gallery->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $gallery->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $gallery->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $gallery->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }}</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="3">{{ old('description_fr', $gallery->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }}</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en', $gallery->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }}</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="3">{{ old('description_ar', $gallery->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">{{ __('Status') }} *</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" {{ $gallery->status === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $gallery->status === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

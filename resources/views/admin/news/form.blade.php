@extends('layouts.admin')

@section('page-title', $news->exists ? 'Edit News' : 'Create News')
@section('title', $news->exists ? 'Edit News' : 'Create News')

@section('content')
<div class="page-header">
    <h1>{{ $news->exists ? __('Edit News') : __('Create News') }}</h1>
    <p class="text-muted">{{ $news->exists ? __('Update news details') : __('Add a new news item') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $news->exists ? route('admin.news.update', $news) : route('admin.news.store') }}" method="POST">
            @csrf
            @if($news->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $news->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $news->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $news->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="content_fr" class="form-label">{{ __('Content (French)') }} *</label>
                    <textarea class="form-control" id="content_fr" name="content_fr" rows="5" required>{{ old('content_fr', $news->content_fr ?? '') }}</textarea>
                    @error('content_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="content_en" class="form-label">{{ __('Content (English)') }} *</label>
                    <textarea class="form-control" id="content_en" name="content_en" rows="5" required>{{ old('content_en', $news->content_en ?? '') }}</textarea>
                    @error('content_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="content_ar" class="form-label">{{ __('Content (Arabic)') }} *</label>
                <textarea class="form-control" id="content_ar" name="content_ar" rows="5" required>{{ old('content_ar', $news->content_ar ?? '') }}</textarea>
                @error('content_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="featured_image" class="form-label">{{ __('Featured Image') }}</label>
                    <input type="text" class="form-control" id="featured_image" name="featured_image" value="{{ old('featured_image', $news->featured_image ?? '') }}">
                    @error('featured_image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status" class="form-label">{{ __('Status') }} *</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" {{ $news->status === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ $news->status === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="published_at" class="form-label">{{ __('Published At') }}</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
                    @error('published_at') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

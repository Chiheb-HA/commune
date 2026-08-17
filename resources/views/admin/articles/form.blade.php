@extends('layouts.admin')

@section('page-title', isset($article) ? 'Edit Article' : 'Create Article')
@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@section('content')
<div class="page-header">
    <h1>{{ isset($article) ? __('Edit Article') : __('Create New Article') }}</h1>
</div>

<form method="POST" action="{{ isset($article) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($article))
        @method('PUT')
    @endif
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Article Information') }}</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                               value="{{ old('title', $article->title ?? '') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label">{{ __('Slug') }}</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                               value="{{ old('slug', $article->slug ?? '') }}">
                        <small class="text-muted">{{ __('Auto-generated if empty') }}</small>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">{{ __('Excerpt') }}</label>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }} <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $article->content ?? '') }}</textarea>
                        <small class="text-muted">{{ __('Use HTML or plain text') }}</small>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- SEO & Tags -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('SEO & Tags') }}</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">{{ __('Meta Title') }}</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                               value="{{ old('meta_title', $article->meta_title ?? '') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">{{ __('Meta Description') }}</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $article->meta_description ?? '') }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tags" class="form-label">{{ __('Tags') }}</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="{{ __('Comma separated') }}"
                               value="{{ old('tags', $article->tags ?? '') }}">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Publishing -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Publishing') }}</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="published" name="published" value="1"
                                   {{ old('published', $article->published ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">
                                {{ __('Publish this article') }}
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">{{ __('Category') }}</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ old('category_id', $article->category_id ?? null) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Featured Image -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Featured Image') }}</h6>
                </div>
                <div class="card-body">
                    @if(isset($article) && $article->featured_image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                    @endif
                    
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                           id="featured_image" name="featured_image" accept="image/*">
                    <small class="text-muted">{{ __('JPG, PNG or GIF. Max 2MB') }}</small>
                    @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- Actions -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-check-circle"></i> 
                        {{ isset($article) ? __('Update Article') : __('Create Article') }}
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary w-100">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@section('extra-js')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
@endsection

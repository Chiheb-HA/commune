@extends('layouts.admin')

@section('page-title', $faq->exists ? 'Edit FAQ' : 'Create FAQ')
@section('title', $faq->exists ? 'Edit FAQ' : 'Create FAQ')

@section('content')
<div class="page-header">
    <h1>{{ $faq->exists ? __('Edit FAQ') : __('Create FAQ') }}</h1>
    <p class="text-muted">{{ $faq->exists ? __('Update FAQ details') : __('Add a new FAQ') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST">
            @csrf
            @if($faq->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="question_fr" class="form-label">{{ __('Question (French)') }} *</label>
                    <input type="text" class="form-control" id="question_fr" name="question_fr" value="{{ old('question_fr', $faq->question_fr ?? '') }}" required>
                    @error('question_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="question_en" class="form-label">{{ __('Question (English)') }} *</label>
                    <input type="text" class="form-control" id="question_en" name="question_en" value="{{ old('question_en', $faq->question_en ?? '') }}" required>
                    @error('question_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="question_ar" class="form-label">{{ __('Question (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="question_ar" name="question_ar" value="{{ old('question_ar', $faq->question_ar ?? '') }}" required>
                    @error('question_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="answer_fr" class="form-label">{{ __('Answer (French)') }} *</label>
                    <textarea class="form-control" id="answer_fr" name="answer_fr" rows="4" required>{{ old('answer_fr', $faq->answer_fr ?? '') }}</textarea>
                    @error('answer_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="answer_en" class="form-label">{{ __('Answer (English)') }} *</label>
                    <textarea class="form-control" id="answer_en" name="answer_en" rows="4" required>{{ old('answer_en', $faq->answer_en ?? '') }}</textarea>
                    @error('answer_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="answer_ar" class="form-label">{{ __('Answer (Arabic)') }} *</label>
                <textarea class="form-control" id="answer_ar" name="answer_ar" rows="4" required>{{ old('answer_ar', $faq->answer_ar ?? '') }}</textarea>
                @error('answer_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="category" class="form-label">{{ __('Category') }}</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $faq->category ?? '') }}">
                    @error('category') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="order" class="form-label">{{ __('Order') }}</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $faq->order ?? 0) }}">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select class="form-select" id="is_active" name="is_active">
                        <option value="1" {{ ($faq->is_active ?? true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ !($faq->is_active ?? true) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </select>
                    @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
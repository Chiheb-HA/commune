@extends('layouts.admin')

@section('page-title', $partnership->exists ? 'Edit Partnership' : 'Create Partnership')
@section('title', $partnership->exists ? 'Edit Partnership' : 'Create Partnership')

@section('content')
<div class="page-header">
    <h1>{{ $partnership->exists ? __('Edit Partnership') : __('Create Partnership') }}</h1>
    <p class="text-muted">{{ $partnership->exists ? __('Update partnership details') : __('Add a new partnership') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $partnership->exists ? route('admin.partnerships.update', $partnership) : route('admin.partnerships.store') }}" method="POST">
            @csrf
            @if($partnership->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $partnership->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $partnership->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $partnership->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }} *</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="4" required>{{ old('description_fr', $partnership->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }} *</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ old('description_en', $partnership->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }} *</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $partnership->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="partner_country" class="form-label">{{ __('Partner Country') }}</label>
                    <input type="text" class="form-control" id="partner_country" name="partner_country" value="{{ old('partner_country', $partnership->partner_country ?? '') }}">
                    @error('partner_country') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="partner_city" class="form-label">{{ __('Partner City') }}</label>
                    <input type="text" class="form-control" id="partner_city" name="partner_city" value="{{ old('partner_city', $partnership->partner_city ?? '') }}">
                    @error('partner_city') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="signed_date" class="form-label">{{ __('Signed Date') }}</label>
                    <input type="date" class="form-control" id="signed_date" name="signed_date" value="{{ old('signed_date', $partnership->signed_date?->format('Y-m-d') ?? '') }}">
                    @error('signed_date') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="image" class="form-label">{{ __('Image') }}</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $partnership->image ?? '') }}">
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="order" class="form-label">{{ __('Order') }}</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $partnership->order ?? 0) }}">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select class="form-select" id="is_active" name="is_active">
                        <option value="1" {{ ($partnership->is_active ?? true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ !($partnership->is_active ?? true) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </select>
                    @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
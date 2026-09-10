@extends('layouts.admin')

@section('page-title', $fundingSource->exists ? 'Edit Funding Source' : 'Create Funding Source')
@section('title', $fundingSource->exists ? 'Edit Funding Source' : 'Create Funding Source')

@section('content')
<div class="page-header">
    <h1>{{ $fundingSource->exists ? __('Edit Funding Source') : __('Create Funding Source') }}</h1>
    <p class="text-muted">{{ $fundingSource->exists ? __('Update funding source details') : __('Add a new funding source') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ $fundingSource->exists ? route('admin.funding-sources.update', $fundingSource) : route('admin.funding-sources.store') }}" method="POST">
            @csrf
            @if($fundingSource->exists)
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="title_fr" class="form-label">{{ __('Title (French)') }} *</label>
                    <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr', $fundingSource->title_fr ?? '') }}" required>
                    @error('title_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_en" class="form-label">{{ __('Title (English)') }} *</label>
                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $fundingSource->title_en ?? '') }}" required>
                    @error('title_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="title_ar" class="form-label">{{ __('Title (Arabic)') }} *</label>
                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $fundingSource->title_ar ?? '') }}" required>
                    @error('title_ar') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description_fr" class="form-label">{{ __('Description (French)') }} *</label>
                    <textarea class="form-control" id="description_fr" name="description_fr" rows="4" required>{{ old('description_fr', $fundingSource->description_fr ?? '') }}</textarea>
                    @error('description_fr') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description_en" class="form-label">{{ __('Description (English)') }} *</label>
                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ old('description_en', $fundingSource->description_en ?? '') }}</textarea>
                    @error('description_en') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description_ar" class="form-label">{{ __('Description (Arabic)') }} *</label>
                <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $fundingSource->description_ar ?? '') }}</textarea>
                @error('description_ar') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="type" class="form-label">{{ __('Type') }} *</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="dotation_non_affectee" {{ ($fundingSource->type ?? '') === 'dotation_non_affectee' ? 'selected' : '' }}>Dotation Non Affectée</option>
                        <option value="dotation_affectee" {{ ($fundingSource->type ?? '') === 'dotation_affectee' ? 'selected' : '' }}>Dotation Affectée</option>
                        <option value="subvention_exceptionnelle" {{ ($fundingSource->type ?? '') === 'subvention_exceptionnelle' ? 'selected' : '' }}>Subvention Exceptionnelle</option>
                        <option value="pret" {{ ($fundingSource->type ?? '') === 'pret' ? 'selected' : '' }}>Prêt</option>
                    </select>
                    @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="amount" class="form-label">{{ __('Amount') }}</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ old('amount', $fundingSource->amount ?? '') }}">
                    @error('amount') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="fiscal_year" class="form-label">{{ __('Fiscal Year') }}</label>
                    <input type="number" class="form-control" id="fiscal_year" name="fiscal_year" value="{{ old('fiscal_year', $fundingSource->fiscal_year ?? '') }}">
                    @error('fiscal_year') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="order" class="form-label">{{ __('Order') }}</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $fundingSource->order ?? 0) }}">
                    @error('order') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="is_active" class="form-label">{{ __('Status') }}</label>
                    <select class="form-select" id="is_active" name="is_active">
                        <option value="1" {{ ($fundingSource->is_active ?? true) ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="0" {{ !($fundingSource->is_active ?? true) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </select>
                    @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <a href="{{ route('admin.funding-sources.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

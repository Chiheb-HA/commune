@extends('layouts.admin')

@section('page-title', isset($municipalService) ? __('messages.Edit Service') : __('messages.New Service'))
@section('title', isset($municipalService) ? __('messages.Edit Service') : __('messages.New Service'))

@section('content')
<div class="page-header">
    <h1>{{ isset($municipalService) ? __('messages.Edit Service') : __('messages.New Service') }}</h1>
    <p class="text-muted">{{ isset($municipalService) ? __('messages.Update service information') : __('messages.Create a new municipal service') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($municipalService) ? route('admin.municipal-services.update', $municipalService) : route('admin.municipal-services.store') }}">
            @csrf
            @if(isset($municipalService))
                @method('PUT')
            @endif

            <!-- Arabic Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.Arababic') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Name') }} (AR)</label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $municipalService->name_ar ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Icon') }}</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', $municipalService->icon ?? '') }}" placeholder="bi bi-building">
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (AR)</label>
                    <textarea name="description_ar" class="form-control" rows="3" required>{{ old('description_ar', $municipalService->description_ar ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Requirements') }} (AR)</label>
                    <textarea name="requirements_ar" class="form-control" rows="2">{{ old('requirements_ar', $municipalService->requirements_ar ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Documents Required') }} (AR)</label>
                    <textarea name="documents_required_ar" class="form-control" rows="2">{{ old('documents_required_ar', $municipalService->documents_required_ar ?? '') }}</textarea>
                </div>
            </div>

            <!-- French Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.French') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Name') }} (FR)</label>
                    <input type="text" name="name_fr" class="form-control" value="{{ old('name_fr', $municipalService->name_fr ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (FR)</label>
                    <textarea name="description_fr" class="form-control" rows="3" required>{{ old('description_fr', $municipalService->description_fr ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Requirements') }} (FR)</label>
                    <textarea name="requirements_fr" class="form-control" rows="2">{{ old('requirements_fr', $municipalService->requirements_fr ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Documents Required') }} (FR)</label>
                    <textarea name="documents_required_fr" class="form-control" rows="2">{{ old('documents_required_fr', $municipalService->documents_required_fr ?? '') }}</textarea>
                </div>
            </div>

            <!-- English Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.English') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Name') }} (EN)</label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $municipalService->name_en ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (EN)</label>
                    <textarea name="description_en" class="form-control" rows="3" required>{{ old('description_en', $municipalService->description_en ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Requirements') }} (EN)</label>
                    <textarea name="requirements_en" class="form-control" rows="2">{{ old('requirements_en', $municipalService->requirements_en ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Documents Required') }} (EN)</label>
                    <textarea name="documents_required_en" class="form-control" rows="2">{{ old('documents_required_en', $municipalService->documents_required_en ?? '') }}</textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Contact Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $municipalService->phone ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $municipalService->email ?? '') }}">
                </div>
            </div>

            <!-- Service Details -->
            <h5 class="mb-3 mt-4">{{ __('messages.Service Details') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.Processing Time') }}</label>
                    <input type="text" name="processing_time" class="form-control" value="{{ old('processing_time', $municipalService->processing_time ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.Cost') }}</label>
                    <input type="text" name="cost" class="form-control" value="{{ old('cost', $municipalService->cost ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.Order') }}</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $municipalService->order ?? 0) }}" min="0">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" {{ old('is_active', $municipalService->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">{{ __('messages.Active') }}</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.municipal-services.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

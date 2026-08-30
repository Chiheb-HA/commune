@extends('layouts.admin')

@section('page-title', isset($department) ? __('messages.Edit Department') : __('messages.New Department'))
@section('title', isset($department) ? __('messages.Edit Department') : __('messages.New Department'))

@section('content')
<div class="page-header">
    <h1>{{ isset($department) ? __('messages.Edit Department') : __('messages.New Department') }}</h1>
    <p class="text-muted">{{ isset($department) ? __('messages.Update department information') : __('messages.Create a new municipal department') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($department) ? route('admin.departments.update', $department) : route('admin.departments.store') }}">
            @csrf
            @if(isset($department))
                @method('PUT')
            @endif

            <!-- Arabic Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.Arabic') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Name') }} (AR)</label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $department->name_ar ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (AR)</label>
                    <textarea name="description_ar" class="form-control" rows="3" required>{{ old('description_ar', $department->description_ar ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Responsibilities') }} (AR)</label>
                    <textarea name="responsibilities_ar" class="form-control" rows="2">{{ old('responsibilities_ar', $department->responsibilities_ar ?? '') }}</textarea>
                </div>
            </div>

            <!-- French Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.French') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Name') }} (FR)</label>
                    <input type="text" name="name_fr" class="form-control" value="{{ old('name_fr', $department->name_fr ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (FR)</label>
                    <textarea name="description_fr" class="form-control" rows="3" required>{{ old('description_fr', $department->description_fr ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Responsibilities') }} (FR)</label>
                    <textarea name="responsibilities_fr" class="form-control" rows="2">{{ old('responsibilities_fr', $department->responsibilities_fr ?? '') }}</textarea>
                </div>
            </div>

            <!-- English Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.English') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Name') }} (EN)</label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $department->name_en ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Description') }} (EN)</label>
                    <textarea name="description_en" class="form-control" rows="3" required>{{ old('description_en', $department->description_en ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Responsibilities') }} (EN)</label>
                    <textarea name="responsibilities_en" class="form-control" rows="2">{{ old('responsibilities_en', $department->responsibilities_en ?? '') }}</textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Contact Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $department->phone ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $department->email ?? '') }}">
                </div>
            </div>

            <!-- Location Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Location Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Location') }}</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $department->location ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Building Number') }}</label>
                    <input type="text" name="building_number" class="form-control" value="{{ old('building_number', $department->building_number ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Floor') }}</label>
                    <input type="text" name="floor" class="form-control" value="{{ old('floor', $department->floor ?? '') }}">
                </div>
            </div>

            <!-- Department Details -->
            <h5 class="mb-3 mt-4">{{ __('messages.Department Details') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Head Official') }}</label>
                    <select name="head_id" class="form-select">
                        <option value="">{{ __('messages.Select Official') }}</option>
                        @foreach($officials as $official)
                            <option value="{{ $official->cin }}" {{ old('head_id', $department->head_id ?? '') == $official->cin ? 'selected' : '' }}>
                                {{ $official->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Order') }}</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $department->order ?? 0) }}" min="0">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">{{ __('messages.Active') }}</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('page-title', isset($official) ? __('messages.Edit Official') : __('messages.New Official'))
@section('title', isset($official) ? __('messages.Edit Official') : __('messages.New Official'))

@section('content')
<div class="page-header">
    <h1>{{ isset($official) ? __('messages.Edit Official') : __('messages.New Official') }}</h1>
    <p class="text-muted">{{ isset($official) ? __('messages.Update official information') : __('messages.Add a new municipal official') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($official) ? route('admin.officials.update', $official) : route('admin.officials.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($official))
                @method('PUT')
            @endif

            <!-- Basic Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Basic Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.User') }}</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">{{ __('messages.Select User') }}</option>
                        @foreach($users as $user)
                            <option value="{{ $user->cin }}" {{ old('user_id', $official->user_id ?? '') == $user->cin ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->cin }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Department') }}</label>
                    <select name="department_id" class="form-select" required>
                        <option value="">{{ __('messages.Select Department') }}</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $official->department_id ?? '') == $department->id ? 'selected' : '' }}>
                                {{ $department->getTranslatableContent('name') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Position Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.Position Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Position') }} (AR)</label>
                    <input type="text" name="position_ar" class="form-control" value="{{ old('position_ar', $official->position_ar ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Position') }} (FR)</label>
                    <input type="text" name="position_fr" class="form-control" value="{{ old('position_fr', $official->position_fr ?? '') }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Position') }} (EN)</label>
                    <input type="text" name="position_en" class="form-control" value="{{ old('position_en', $official->position_en ?? '') }}" required>
                </div>
            </div>

            <!-- Contact Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Contact Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $official->phone ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $official->email ?? '') }}">
                </div>
            </div>

            <!-- Office Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Office Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Office Location') }}</label>
                    <input type="text" name="office_location" class="form-control" value="{{ old('office_location', $official->office_location ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('messages.Office Number') }}</label>
                    <input type="text" name="office_number" class="form-control" value="{{ old('office_number', $official->office_number ?? '') }}">
                </div>
            </div>

            <!-- Bio Fields -->
            <h5 class="mb-3 mt-4">{{ __('messages.Biography') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Bio') }} (AR)</label>
                    <textarea name="bio_ar" class="form-control" rows="3">{{ old('bio_ar', $official->bio_ar ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Bio') }} (FR)</label>
                    <textarea name="bio_fr" class="form-control" rows="3">{{ old('bio_fr', $official->bio_fr ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Bio') }} (EN)</label>
                    <textarea name="bio_en" class="form-control" rows="3">{{ old('bio_en', $official->bio_en ?? '') }}</textarea>
                </div>
            </div>

            <!-- Photo Upload -->
            <h5 class="mb-3 mt-4">{{ __('messages.Photo') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Profile Photo') }}</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    @if(isset($official) && $official->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $official->photo) }}" alt="Current photo" style="max-height: 100px;">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Additional Information -->
            <h5 class="mb-3 mt-4">{{ __('messages.Additional Information') }}</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Specializations') }}</label>
                    <textarea name="specializations" class="form-control" rows="2">{{ old('specializations', $official->specializations ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.Qualifications') }}</label>
                    <textarea name="qualifications" class="form-control" rows="2">{{ old('qualifications', $official->qualifications ?? '') }}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.Status') }}</label>
                    <select name="status" class="form-select" required>
                        <option value="active" {{ old('status', $official->status ?? 'active') == 'active' ? 'selected' : '' }}>
                            {{ __('messages.Active') }}
                        </option>
                        <option value="inactive" {{ old('status', $official->status ?? 'active') == 'inactive' ? 'selected' : '' }}>
                            {{ __('messages.Inactive') }}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.Start Date') }}</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $official->start_date ? $official->start_date->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">{{ __('messages.End Date') }}</label>
                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $official->end_date ? $official->end_date->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('page-title', __('messages.Settings'))
@section('title', __('messages.Settings'))

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>{{ __('messages.Settings') }}</h1>
        <p class="text-muted">{{ __('messages.Manage application settings and configuration') }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-speedometer2"></i> {{ __('messages.Dashboard') }}
        </a>
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm" target="_blank">
            <i class="bi bi-globe"></i> {{ __('messages.Visit Website') }}
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-building me-2"></i>{{ __('messages.Commune Information') }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update-commune-info') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="commune_name" class="form-label">{{ __('messages.Commune Name') }}</label>
                    <input type="text" class="form-control" id="commune_name" name="commune_name" value="{{ $settings['commune_name'] ?? '' }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="commune_phone" class="form-label">{{ __('messages.Phone Number') }}</label>
                    <input type="text" class="form-control" id="commune_phone" name="commune_phone" value="{{ $settings['commune_phone'] ?? '' }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="commune_address" class="form-label">{{ __('messages.Address') }}</label>
                <textarea class="form-control" id="commune_address" name="commune_address" rows="3" required>{{ $settings['commune_address'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="commune_email" class="form-label">{{ __('messages.Email Address') }}</label>
                <input type="email" class="form-control" id="commune_email" name="commune_email" value="{{ $settings['commune_email'] ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="commune_logo" class="form-label">{{ __('messages.Commune Logo') }}</label>
                <input type="file" class="form-control" id="commune_logo" name="commune_logo" accept="image/*">
                @if($settings['commune_logo_path'] ?? false)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings['commune_logo_path']) }}" alt="{{ __('messages.Current Logo') }}" style="max-height: 100px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy me-1"></i>{{ __('messages.Save Commune Info') }}
            </button>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-clock me-2"></i>{{ __('messages.Working Hours') }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update-working-hours') }}">
            @csrf
            @method('PATCH')

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Day') }}</th>
                            <th>{{ __('messages.Open Time') }}</th>
                            <th>{{ __('messages.Close Time') }}</th>
                            <th>{{ __('messages.Closed') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                            <tr>
                                <td class="fw-medium">{{ __('messages.' . ucfirst($day)) }}</td>
                                <td>
                                    <input type="time" class="form-control form-control-sm" name="working_hours[{{ $day }}][open]" value="{{ $workingHours[$day]['open'] ?? '' }}" {{ $workingHours[$day]['closed'] ?? false ? 'disabled' : '' }}>
                                </td>
                                <td>
                                    <input type="time" class="form-control form-control-sm" name="working_hours[{{ $day }}][close]" value="{{ $workingHours[$day]['close'] ?? '' }}" {{ $workingHours[$day]['closed'] ?? false ? 'disabled' : '' }}>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="working_hours[{{ $day }}][closed]" value="1" {{ $workingHours[$day]['closed'] ?? false ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ __('messages.Closed') }}</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy me-1"></i>{{ __('messages.Save Working Hours') }}
            </button>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-toggles me-2"></i>{{ __('messages.Service Availability') }}</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.settings.update-service-toggles') }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_service_birth_certificate_enabled" name="is_service_birth_certificate_enabled" value="1" {{ ($settings['is_service_birth_certificate_enabled'] ?? '1') === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_service_birth_certificate_enabled">
                        {{ __('messages.Birth Certificate Service') }}
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_service_permit_enabled" name="is_service_permit_enabled" value="1" {{ ($settings['is_service_permit_enabled'] ?? '1') === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_service_permit_enabled">
                        {{ __('messages.Permit Request Service') }}
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy me-1"></i>{{ __('messages.Save Service Toggles') }}
            </button>
        </form>
    </div>
</div>
@endsection

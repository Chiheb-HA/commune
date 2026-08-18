@extends('layouts.admin')

@section('page-title', __('messages.Profile'))
@section('title', __('messages.Profile'))

@section('content')

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>{{ __('messages.Profile') }}</h1>
        <p class="text-muted">{{ __('messages.Manage your account information and preferences') }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-speedometer2"></i> {{ __('messages.Dashboard') }}
        </a>
        <a href="{{ route('admin.settings') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-gear"></i> {{ __('messages.Settings') }}
        </a>
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm" target="_blank">
            <i class="bi bi-globe"></i> {{ __('messages.Visit Website') }}
        </a>
    </div>
</div>

<div class="row g-4">

    {{-- Profile Information --}}
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>{{ __('messages.Profile Information') }}</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-4">{{ __('messages.Update your account\'s profile information and email address.') }}</p>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">{{ __('messages.Name') }}</label>
                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">{{ __('messages.Email') }}</label>
                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-warning small">
                                    {{ __('messages.Your email address is unverified.') }}
                                    <button form="send-verification" class="btn btn-link btn-sm p-0">
                                        {{ __('messages.Click here to re-send the verification email.') }}
                                    </button>
                                </p>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="text-success small">{{ __('messages.A new verification link has been sent to your email address.') }}</p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-floppy me-1"></i>{{ __('messages.Save') }}
                        </button>
                        @if (session('status') === 'profile-updated')
                            <span class="text-success small"><i class="bi bi-check-circle me-1"></i>{{ __('messages.Saved.') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update Password --}}
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-lock me-2"></i>{{ __('messages.Update Password') }}</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-4">{{ __('messages.Ensure your account is using a long, random password to stay secure.') }}</p>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="update_password_current_password" class="form-label fw-medium">{{ __('messages.Current Password') }}</label>
                        <input id="update_password_current_password" name="current_password" type="password"
                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                            autocomplete="current-password">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password" class="form-label fw-medium">{{ __('messages.New Password') }}</label>
                        <input id="update_password_password" name="password" type="password"
                            class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                            autocomplete="new-password">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="update_password_password_confirmation" class="form-label fw-medium">{{ __('messages.Confirm Password') }}</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                            class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                            autocomplete="new-password">
                        @error('password_confirmation', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-floppy me-1"></i>{{ __('messages.Save') }}
                        </button>
                        @if (session('status') === 'password-updated')
                            <span class="text-success small"><i class="bi bi-check-circle me-1"></i>{{ __('messages.Saved.') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Account Security --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>{{ __('messages.Account Security') }}</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">
                    {{ __('messages.Keep your account protected with a strong password and up-to-date contact information.') }}
                </p>
                <ul class="list-unstyled small mb-0 text-muted">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('messages.Use a unique password for your account.') }}</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ __('messages.Update your profile details regularly.') }}</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Delete Account --}}
    <div class="col-lg-6">
        <div class="card border-danger">
            <div class="card-header bg-danger bg-opacity-10">
                <h5 class="mb-0 text-danger"><i class="bi bi-exclamation-triangle me-2"></i>{{ __('messages.Delete Account') }}</h5>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-4">
                    {{ __('messages.Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    <i class="bi bi-trash me-1"></i>{{ __('messages.Delete Account') }}
                </button>
            </div>
        </div>
    </div>

</div>

{{-- Delete Account Modal --}}
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ __('messages.Are you sure you want to delete your account?') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p class="text-muted">
                        {{ __('messages.Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                    </p>
                    <div class="mt-3">
                        <label for="delete_password" class="form-label fw-medium">{{ __('messages.Password') }}</label>
                        <input id="delete_password" name="password" type="password"
                            class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                            placeholder="{{ __('messages.Enter your password') }}">
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i>{{ __('messages.Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new bootstrap.Modal(document.getElementById('deleteAccountModal')).show();
    });
</script>
@endif

@endsection

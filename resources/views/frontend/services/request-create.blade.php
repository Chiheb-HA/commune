@extends('layouts.app')

@section('title', __('messages.submit_request'))

@section('content')
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">{{ __('messages.submit_request') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('services.request.store') }}" enctype="multipart/form-data" data-confirm="{{ __('messages.Are you sure you want to submit this request?') }}" data-confirm-title="{{ __('messages.Submit Request') }}" data-confirm-text="{{ __('messages.Confirm') }}" data-cancel-text="{{ __('messages.Cancel') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="service_id" class="form-label">{{ __('messages.select_service') }}</label>
                            <select class="form-select" id="service_id" name="service_id" required>
                                <option value="">{{ __('messages.choose_service') }}</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @guest
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="cin" class="form-label">{{ __('messages.cin') }}</label>
                                <input type="text" class="form-control" id="cin" name="cin" value="{{ old('cin') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="cin" class="form-label">{{ __('messages.cin') }}</label>
                                <input type="text" class="form-control" id="cin" name="cin" value="{{ auth()->user()->cin }}" readonly>
                            </div>
                        @endguest

                        <div class="mb-3">
                            <label for="priority" class="form-label">{{ __('messages.priority') }}</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="low">{{ __('messages.low') }}</option>
                                <option value="medium" selected>{{ __('messages.medium') }}</option>
                                <option value="high">{{ __('messages.high') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('messages.description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="attachments" class="form-label">{{ __('messages.attachments') }}</label>
                            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple accept=".pdf,.jpg,.jpeg,.png">
                            <small class="text-muted">{{ __('messages.attachments_hint') }}</small>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

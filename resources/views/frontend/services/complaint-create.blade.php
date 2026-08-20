@extends('layouts.app')

@section('title', __('messages.file_complaint'))

@section('content')
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">{{ __('messages.file_complaint') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('services.complaint.store') }}" enctype="multipart/form-data" data-confirm="{{ __('messages.Are you sure you want to submit this complaint?') }}" data-confirm-title="{{ __('messages.Submit Complaint') }}" data-confirm-text="{{ __('messages.Confirm') }}" data-cancel-text="{{ __('messages.Cancel') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">{{ __('messages.choose_service') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('messages.description') }}</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cin" class="form-label">{{ __('messages.cin') }}</label>
                            <input type="text" class="form-control" id="cin" name="cin" value="{{ auth()->user()->cin }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">{{ __('messages.priority') }}</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="low">{{ __('messages.low') }}</option>
                                <option value="medium" selected>{{ __('messages.medium') }}</option>
                                <option value="high">{{ __('messages.high') }}</option>
                            </select>
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

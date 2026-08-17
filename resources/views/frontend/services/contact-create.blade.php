@extends('layouts.app')

@section('title', __('messages.contact'))

@section('content')
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">{{ __('messages.contact') }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('services.contact.store') }}" data-confirm="{{ __('messages.Are you sure you want to send this message?') }}" data-confirm-title="{{ __('messages.Send Message') }}" data-confirm-text="{{ __('messages.Confirm') }}" data-cancel-text="{{ __('messages.Cancel') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('messages.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">{{ __('messages.subject') }}</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('messages.message') }}</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('messages.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

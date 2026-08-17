@extends('layouts.app')

@section('title', '500 - Server Error')

@section('content')
<div class="container-lg py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-body py-5">
                    <i class="bi bi-exclamation-triangle" style="font-size: 5rem; color: var(--danger);"></i>
                    <h1 class="display-1 fw-bold mt-4">500</h1>
                    <h2 class="h4 mb-3">{{ __('messages.server_error_title') }}</h2>
                    <p class="text-muted mb-4">{{ __('messages.server_error_message') }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

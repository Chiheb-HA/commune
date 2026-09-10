@extends('layouts.app')

@section('title', $competition->title)

@section('content')
<div class="container-lg py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('competitions.index') }}">{{ __('messages.Competitions') }}</a></li>
            <li class="breadcrumb-item active">{{ $competition->title }}</li>
        </ol>
    </nav>

    <h1 class="mb-4">{{ $competition->title }}</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="mb-4">
                <span class="badge {{ $competition->status === 'open' ? 'bg-success' : ($competition->status === 'closed' ? 'bg-danger' : 'bg-warning') }} me-2">
                    {{ $competition->status_label }}
                </span>
                <span class="text-muted">
                    <i class="bi bi-calendar"></i> {{ $competition->start_date->format('d/m/Y') }} - {{ $competition->end_date->format('d/m/Y') }}
                </span>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('messages.description') }}</h5>
                    <div class="card-text">{{ $competition->description }}</div>
                </div>
            </div>

            @if($competition->attachment_path)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.Attachment') }}</h5>
                        <a href="{{ asset('storage/' . $competition->attachment_path) }}" class="btn btn-primary" target="_blank">
                            <i class="bi bi-download"></i> {{ __('messages.Download') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('messages.Competition Details') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>{{ __('messages.Status') }}:</strong>
                            <span class="badge {{ $competition->status === 'open' ? 'bg-success' : ($competition->status === 'closed' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $competition->status_label }}
                            </span>
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('messages.Start Date') }}:</strong> {{ $competition->start_date->format('d/m/Y') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('messages.End Date') }}:</strong> {{ $competition->end_date->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', __('messages.Staff Resources'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Staff Resources') }}</h1>
    <p class="lead text-muted mb-5">{{ __('messages.Guides, training, and technical assistance for staff') }}</p>

    @forelse($staffResources as $type => $typeResources)
        <div class="mb-5">
            <h3 class="mb-3">
                @if($type === 'guide')
                    <i class="bi bi-book"></i> {{ __('messages.Guides') }}
                @elseif($type === 'formation')
                    <i class="bi bi-mortarboard"></i> {{ __('messages.Training') }}
                @elseif($type === 'assistance_technique')
                    <i class="bi bi-tools"></i> {{ __('messages.Technical Assistance') }}
                @else
                    {{ ucfirst($type) }}
                @endif
            </h3>
            <div class="row g-4">
                @foreach($typeResources as $resource)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $resource->title }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($resource->description, 100) }}</p>
                                <div class="mt-3">
                                    @if($resource->file_path)
                                        <a href="{{ asset('storage/' . $resource->file_path) }}" class="btn btn-sm btn-primary me-2" target="_blank">
                                            <i class="bi bi-download"></i> {{ __('messages.Download') }}
                                        </a>
                                    @endif
                                    @if($resource->external_link)
                                        <a href="{{ $resource->external_link }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="bi bi-link"></i> {{ __('messages.View') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            {{ __('messages.No staff resources available at the moment.') }}
        </div>
    @endforelse
</div>
@endsection
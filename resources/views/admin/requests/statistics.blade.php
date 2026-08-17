@extends('layouts.admin')

@section('page-title', __('messages.Requests Statistics'))
@section('title', __('messages.Requests Statistics'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Requests Statistics') }}</h1>
    <p class="text-muted">{{ __('messages.Manage citizen service requests') }}</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Pending Requests') }}</h6>
                        <h3 class="mb-0">{{ $stats['pending'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-clock" style="font-size: 2rem; color: #f59e0b;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.In Progress') }}</h6>
                        <h3 class="mb-0">{{ $stats['in_progress'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-arrow-repeat" style="font-size: 2rem; color: #3b82f6;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Completed') }}</h6>
                        <h3 class="mb-0">{{ $stats['completed'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-check-circle" style="font-size: 2rem; color: #10b981;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Total') }}</h6>
                        <h3 class="mb-0">{{ $stats['total'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-inbox" style="font-size: 2rem; color: #6b7280;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    @if(isset($stats['by_service']))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Requests by Service') }}</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Service') }}</th>
                            <th>{{ __('messages.Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['by_service'] as $serviceName => $count)
                        <tr>
                            <td>{{ $serviceName }}</td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if(isset($stats['by_priority']))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Requests by Priority') }}</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Priority') }}</th>
                            <th>{{ __('messages.Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['by_priority'] as $priority => $count)
                        <tr>
                            <td>
                                <span class="badge {{ $priority === 'high' ? 'bg-danger' : ($priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                    {{ ucfirst($priority) }}
                                </span>
                            </td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="mt-4">
    <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> {{ __('messages.back') }}
    </a>
</div>
@endsection

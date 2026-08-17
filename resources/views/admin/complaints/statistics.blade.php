@extends('layouts.admin')

@section('page-title', __('messages.Complaints Statistics'))
@section('title', __('messages.Complaints Statistics'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Complaints Statistics') }}</h1>
    <p class="text-muted">{{ __('messages.Manage citizen complaints') }}</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.New') }}</h6>
                        <h3 class="mb-0">{{ $stats['new'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-exclamation-circle" style="font-size: 2rem; color: #ef4444;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.In Investigation') }}</h6>
                        <h3 class="mb-0">{{ $stats['in_investigation'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-search" style="font-size: 2rem; color: #3b82f6;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Resolved') }}</h6>
                        <h3 class="mb-0">{{ $stats['resolved'] ?? 0 }}</h3>
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
                    <i class="bi bi-exclamation-triangle" style="font-size: 2rem; color: #6b7280;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    @if(isset($stats['dismissed']) || isset($stats['closed']))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Other Status') }}</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($stats['dismissed']))
                        <tr>
                            <td>{{ __('messages.Dismissed') }}</td>
                            <td>{{ $stats['dismissed'] }}</td>
                        </tr>
                        @endif
                        @if(isset($stats['closed']))
                        <tr>
                            <td>{{ __('messages.Closed') }}</td>
                            <td>{{ $stats['closed'] }}</td>
                        </tr>
                        @endif
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
                <h6 class="mb-0">{{ __('messages.Complaints by Priority') }}</h6>
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
    <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> {{ __('messages.back') }}
    </a>
</div>
@endsection

@extends('layouts.admin')

@section('page-title', __('messages.Citizen Requests'))
@section('title', __('messages.Citizen Requests'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Citizen Requests') }}</h1>
    <p class="text-muted">{{ __('messages.Manage citizen service requests') }}</p>
    <a href="{{ route('admin.requests.statistics') }}" class="btn btn-outline-primary">
        <i class="bi bi-bar-chart"></i> {{ __('messages.Requests Statistics') }}
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h3>{{ $stats['pending'] ?? 0 }}</h3>
                <small>{{ __('messages.Pending') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h3>{{ $stats['in_progress'] ?? 0 }}</h3>
                <small>{{ __('messages.In Progress') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h3>{{ $stats['completed'] ?? 0 }}</h3>
                <small>{{ __('messages.Completed') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h3>{{ $stats['total'] ?? 0 }}</h3>
                <small>{{ __('messages.Total') }}</small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($requests->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Number') }}</th>
                            <th>{{ __('messages.Service') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Priority') }}</th>
                            <th>{{ __('messages.Date') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->request_number }}</td>
                                <td>{{ $request->service->name_en ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($request->status) {
                                            'pending' => 'bg-warning',
                                            'in_progress' => 'bg-info',
                                            'on_hold' => 'bg-secondary',
                                            'completed' => 'bg-success',
                                            'rejected' => 'bg-danger',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $request->priority === 'high' ? 'bg-danger' : ($request->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                        {{ ucfirst($request->priority) }}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->translatedFormat('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.requests.show', $request->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $requests->links() }}
        @else
            <p class="text-muted">{{ __('messages.No requests found.') }}</p>
        @endif
    </div>
</div>
@endsection

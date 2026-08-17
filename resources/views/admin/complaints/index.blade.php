@extends('layouts.admin')

@section('page-title', __('messages.Complaints'))
@section('title', __('messages.Complaints'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Complaints') }}</h1>
    <p class="text-muted">{{ __('messages.Manage citizen complaints') }}</p>
    <a href="{{ route('admin.complaints.statistics') }}" class="btn btn-outline-primary">
        <i class="bi bi-bar-chart"></i> {{ __('messages.Complaints Statistics') }}
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h3>{{ $stats['new'] ?? 0 }}</h3>
                <small>{{ __('messages.New') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h3>{{ $stats['in_investigation'] ?? 0 }}</h3>
                <small>{{ __('messages.In Investigation') }}</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h3>{{ $stats['resolved'] ?? 0 }}</h3>
                <small>{{ __('messages.Resolved') }}</small>
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
        @if($complaints->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Number') }}</th>
                            <th>{{ __('messages.Category') }}</th>
                            <th>{{ __('messages.Description') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Priority') }}</th>
                            <th>{{ __('messages.Date') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                            <tr>
                                <td>{{ $complaint->complaint_number }}</td>
                                <td>{{ ucfirst($complaint->category) }}</td>
                                <td>{{ Str::limit($complaint->description_fr ?? 'N/A', 40) }}</td>
                                <td>
                                    <span class="badge {{ $complaint->status === 'new' ? 'bg-danger' : ($complaint->status === 'resolved' ? 'bg-success' : 'bg-warning') }}">
                                        {{ ucfirst($complaint->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $complaint->priority === 'high' ? 'bg-danger' : ($complaint->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                        {{ ucfirst($complaint->priority) }}
                                    </span>
                                </td>
                                <td>{{ $complaint->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.complaints.show', $complaint) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $complaints->links() }}
        @else
            <p class="text-muted">{{ __('messages.No complaints found.') }}</p>
        @endif
    </div>
</div>
@endsection

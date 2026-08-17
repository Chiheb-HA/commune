@extends('layouts.app')

@section('title', __('messages.citizen_dashboard'))

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">{{ __('messages.welcome') }}, {{ auth()->user()->name }}</h1>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('messages.my_requests') }}</h5>
                    <h2 class="display-4">{{ $pendingRequests }}</h2>
                    <p class="text-muted">{{ __('messages.pending_requests') }}</p>
                    <a href="{{ route('citizen.requests.index') }}" class="btn btn-primary">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('messages.my_complaints') }}</h5>
                    <h2 class="display-4">{{ $pendingComplaints }}</h2>
                    <p class="text-muted">{{ __('messages.pending_complaints') }}</p>
                    <a href="{{ route('citizen.complaints.index') }}" class="btn btn-primary">{{ __('messages.view_all') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Requests -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-3">{{ __('messages.recent_requests') }}</h3>
            @if($requests->count() > 0)
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.request_number') }}</th>
                                        <th>{{ __('messages.service') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $request)
                                        <tr>
                                            <td>{{ $request->request_number }}</td>
                                            <td>{{ $request->service->{'name_' . app()->getLocale()} ?? $request->service->name_fr ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $request->status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ __('messages.' . ucfirst($request->status)) }}
                                                </span>
                                            </td>
                                            <td>{{ $request->created_at->translatedFormat('d F Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-muted">{{ __('messages.no_requests') }}</p>
            @endif
        </div>
    </div>

    <!-- Recent Complaints -->
    <div class="row">
        <div class="col-12">
            <h3 class="mb-3">{{ __('messages.recent_complaints') }}</h3>
            @if($complaints->count() > 0)
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.complaint_number') }}</th>
                                        <th>{{ __('messages.subject') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complaints as $complaint)
                                        <tr>
                                            <td>{{ $complaint->complaint_number }}</td>
                                            <td>{{ Str::limit($complaint->description_fr ?? 'N/A', 50) }}</td>
                                            <td>
                                                <span class="badge bg-{{ $complaint->status === 'resolved' ? 'success' : 'warning' }}">
                                                    {{ __('messages.' . ucfirst($complaint->status)) }}
                                                </span>
                                            </td>
                                            <td>{{ $complaint->created_at->translatedFormat('d F Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-muted">{{ __('messages.no_complaints') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection

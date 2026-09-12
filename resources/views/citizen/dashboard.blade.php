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

    <!-- Quick Access to New Features -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-building" style="font-size: 3rem; color: var(--primary);"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.municipal_services') }}</h5>
                    <p class="card-text text-muted">{{ $totalServices }} {{ __('messages.Active') }}</p>
                    <a href="{{ route('services.index') }}" class="btn btn-primary">{{ __('messages.browse_services') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-building-gear" style="font-size: 3rem; color: var(--primary);"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.departments') }}</h5>
                    <p class="card-text text-muted">{{ $totalDepartments }} {{ __('messages.departments') }}</p>
                    <a href="{{ route('departments.index') }}" class="btn btn-primary">{{ __('messages.find_contacts') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-badge" style="font-size: 3rem; color: var(--primary);"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.officials') }}</h5>
                    <p class="card-text text-muted">{{ $totalOfficials }} {{ __('messages.officials') }}</p>
                    <a href="{{ route('officials.index') }}" class="btn btn-primary">{{ __('messages.staff_directory') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Services -->
    @if(isset($popularServices) && $popularServices->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-3">{{ __('messages.Popular Services') }}</h3>
            <div class="row g-4">
                @foreach($popularServices as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    @if($service->icon)
                                        <i class="{{ $service->icon }}" style="font-size: 2rem; color: var(--primary);"></i>
                                    @else
                                        <i class="bi bi-building" style="font-size: 2rem; color: var(--primary);"></i>
                                    @endif
                                </div>
                                <h6 class="card-title">{{ $service->getTranslatableContent('name') }}</h6>
                                <p class="card-text text-muted small">{{ Str::limit($service->getTranslatableContent('description'), 80) }}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('services.request') }}" class="btn btn-sm btn-primary">{{ __('messages.submit_request') }}</a>
                                <a href="{{ route('services.complaint') }}" class="btn btn-sm btn-primary">{{ __('messages.file_complaint') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

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
                                                <span class="badge bg-{{ $request->status === 'completed' ? 'success' : ($request->status === 'rejected' ? 'danger' : ($request->status === 'on_hold' ? 'secondary' : ($request->status === 'in_progress' ? 'info' : 'warning'))) }}">
                                                    {{ __('messages.' . ucfirst(str_replace('_', ' ', $request->status))) }}
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

@extends('layouts.admin')

@section('title', __('messages.facility_reservations'))

@section('page-title', __('messages.facility_reservations'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">{{ __('messages.facility_reservations') }}</h1>
        <p class="text-muted small mb-0">{{ __('messages.manage_facility_reservations_desc') }}</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.facility-reservations.index') }}" class="row g-3">
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">{{ __('messages.all_statuses') }}</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>{{ __('messages.status_pending') }}</option>
                    <option value="approved" {{ $status === 'approved' ? 'selected' : '' }}>{{ __('messages.status_approved') }}</option>
                    <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>{{ __('messages.status_rejected') }}</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="facility_type" class="form-select" onchange="this.form.submit()">
                    <option value="">{{ __('messages.all_facilities') }}</option>
                    <option value="salle_des_fetes" {{ $facilityType === 'salle_des_fetes' ? 'selected' : '' }}>{{ __('messages.facility_salle_des_fetes') }}</option>
                    <option value="souk" {{ $facilityType === 'souk' ? 'selected' : '' }}>{{ __('messages.facility_souk') }}</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('messages.facility_type') }}</th>
                        <th>{{ __('messages.citizen_name') }}</th>
                        <th>{{ __('messages.requested_date') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th>{{ __('messages.created_at') }}</th>
                        <th class="text-end">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $res)
                        <tr>
                            <td>{{ $res->id }}</td>
                            <td>
                                <strong>{{ $res->facility_type === 'salle_des_fetes' ? __('messages.facility_salle_des_fetes') : __('messages.facility_souk') }}</strong>
                            </td>
                            <td>
                                <div>{{ $res->citizen_name }}</div>
                                <small class="text-muted">{{ $res->citizen_phone }}</small>
                            </td>
                            <td>{{ $res->requested_date->translatedFormat('d F Y') }}</td>
                            <td>
                                @if($res->status === 'approved')
                                    <span class="badge bg-success">{{ __('messages.status_approved') }}</span>
                                @elseif($res->status === 'rejected')
                                    <span class="badge bg-danger">{{ __('messages.status_rejected') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                                @endif
                            </td>
                            <td>{{ $res->created_at->translatedFormat('d F Y, H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.facility-reservations.show', $res) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i> {{ __('messages.view_process') }}
                                </a>
                                <form action="{{ route('admin.facility-reservations.destroy', $res) }}" method="POST" class="d-inline" data-confirm="{{ __('messages.are_you_sure') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">{{ __('messages.no_reservations_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($reservations->hasPages())
        <div class="card-footer bg-white">
            {{ $reservations->links() }}
        </div>
    @endif
</div>
@endsection

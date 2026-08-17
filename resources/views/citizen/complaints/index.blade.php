@extends('layouts.app')

@section('title', __('messages.my_complaints'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('messages.my_complaints') }}</h1>
        <a href="{{ route('services.complaint') }}" class="btn btn-primary">{{ __('messages.new_complaint') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if($complaints->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.complaint_number') }}</th>
                                <th>{{ __('messages.category') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.priority') }}</th>
                                <th>{{ __('messages.date') }}</th>
                                <th>{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                                <tr>
                                    <td>{{ $complaint->complaint_number }}</td>
                                    <td>{{ $complaint->category ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $complaint->status === 'resolved' ? 'success' : ($complaint->status === 'new' ? 'warning' : 'info') }}">
                                            {{ $complaint->status }}
                                        </span>
                                    </td>
                                    <td>{{ $complaint->priority }}</td>
                                    <td>{{ $complaint->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('citizen.complaints.show', $complaint) }}" class="btn btn-sm btn-primary">{{ __('messages.view') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $complaints->links() }}
            @else
                <p class="text-muted text-center py-4">{{ __('messages.no_complaints') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection

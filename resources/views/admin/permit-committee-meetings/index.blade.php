@extends('layouts.admin')

@section('title', __('messages.permit_committee_meetings'))

@section('page-title', __('messages.permit_committee_meetings'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">{{ __('messages.permit_committee_meetings') }}</h1>
        <p class="text-muted small mb-0">{{ __('messages.manage_permit_committee_meetings_desc') }}</p>
    </div>
    <a href="{{ route('admin.permit-committee-meetings.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> {{ __('messages.new_permit_committee_meeting') }}
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('messages.meeting_date') }}</th>
                        <th>{{ __('messages.location') }}</th>
                        <th>{{ __('messages.agenda') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th class="text-end">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($meetings as $meeting)
                        <tr>
                            <td>{{ $meeting->id }}</td>
                            <td>
                                <strong>{{ $meeting->meeting_date->translatedFormat('d F Y, H:i') }}</strong>
                            </td>
                            <td>{{ $meeting->location ?? '-' }}</td>
                            <td>
                                {{ Str::limit($meeting->getTranslatableContent('agenda') ?? $meeting->agenda_fr ?? $meeting->agenda_en ?? $meeting->agenda_ar ?? '-', 40) }}
                            </td>
                            <td>
                                @if($meeting->is_active)
                                    <span class="badge bg-success">{{ __('messages.active') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('messages.inactive') }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.permit-committee-meetings.edit', $meeting) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.permit-committee-meetings.destroy', $meeting) }}" method="POST" class="d-inline" data-confirm="{{ __('messages.are_you_sure') }}">
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
                            <td colspan="6" class="text-center text-muted py-4">{{ __('messages.no_meetings_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($meetings->hasPages())
        <div class="card-footer bg-white">
            {{ $meetings->links() }}
        </div>
    @endif
</div>
@endsection

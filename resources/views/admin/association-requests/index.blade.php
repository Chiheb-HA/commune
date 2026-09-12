@extends('layouts.admin')

@section('title', __('messages.association_requests'))

@section('page-title', __('messages.association_requests'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">{{ __('messages.association_requests') }}</h1>
        <p class="text-muted small mb-0">{{ __('messages.manage_association_requests_desc') }}</p>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.association-requests.index') }}" class="row g-3">
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">{{ __('messages.all_statuses') }}</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>{{ __('messages.status_pending') }}</option>
                    <option value="in_review" {{ $status === 'in_review' ? 'selected' : '' }}>{{ __('messages.status_in_review') }}</option>
                    <option value="answered" {{ $status === 'answered' ? 'selected' : '' }}>{{ __('messages.status_answered') }}</option>
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
                        <th>{{ __('messages.association') }}</th>
                        <th>{{ __('messages.subject') }}</th>
                        <th>{{ __('messages.status') }}</th>
                        <th>{{ __('messages.created_at') }}</th>
                        <th class="text-end">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $req)
                        <tr>
                            <td>{{ $req->id }}</td>
                            <td>
                                <strong>{{ $req->association->name ?? 'N/A' }}</strong>
                            </td>
                            <td>
                                {{ Str::limit($req->getTranslatableContent('subject') ?? $req->subject_fr ?? $req->subject_en ?? $req->subject_ar ?? $req->description, 40) }}
                            </td>
                            <td>
                                @if($req->status === 'answered')
                                    <span class="badge bg-success">{{ __('messages.status_answered') }}</span>
                                @elseif($req->status === 'in_review')
                                    <span class="badge bg-warning text-dark">{{ __('messages.status_in_review') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                                @endif
                            </td>
                            <td>{{ $req->created_at->translatedFormat('d F Y, H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.association-requests.show', $req) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i> {{ __('messages.view_answer') }}
                                </a>
                                <form action="{{ route('admin.association-requests.destroy', $req) }}" method="POST" class="d-inline" data-confirm="{{ __('messages.are_you_sure') }}">
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
                            <td colspan="6" class="text-center text-muted py-4">{{ __('messages.no_requests_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($requests->hasPages())
        <div class="card-footer bg-white">
            {{ $requests->links() }}
        </div>
    @endif
</div>
@endsection

@extends('layouts.admin')

@section('title', __('messages.association_request_details'))

@section('page-title', __('messages.association_request_details'))

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.association-requests.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> {{ __('messages.back_to_list') }}
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">
                {{ __('messages.request_details') }} #{{ $requestItem->id }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">{{ __('messages.association') }}</dt>
                    <dd class="col-sm-8"><strong>{{ $requestItem->association->name ?? 'N/A' }}</strong></dd>

                    <dt class="col-sm-4">{{ __('messages.subject') }}</dt>
                    <dd class="col-sm-8">{{ $requestItem->getTranslatableContent('subject') ?? $requestItem->subject_fr ?? $requestItem->subject_en ?? $requestItem->subject_ar ?? '-' }}</dd>

                    <dt class="col-sm-4">{{ __('messages.description') }}</dt>
                    <dd class="col-sm-8"><p class="mb-0 text-break">{{ $requestItem->description }}</p></dd>

                    <dt class="col-sm-4">{{ __('messages.status') }}</dt>
                    <dd class="col-sm-8">
                        @if($requestItem->status === 'answered')
                            <span class="badge bg-success">{{ __('messages.status_answered') }}</span>
                        @elseif($requestItem->status === 'in_review')
                            <span class="badge bg-warning text-dark">{{ __('messages.status_in_review') }}</span>
                        @else
                            <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                        @endif
                    </dd>

                    <dt class="col-sm-4">{{ __('messages.created_at') }}</dt>
                    <dd class="col-sm-8">{{ $requestItem->created_at->translatedFormat('d F Y, H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="bi bi-reply-fill me-1"></i> {{ __('messages.answer_request') }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.association-requests.update', $requestItem) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="status" class="form-label">{{ __('messages.status') }}</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="pending" {{ old('status', $requestItem->status) === 'pending' ? 'selected' : '' }}>{{ __('messages.status_pending') }}</option>
                            <option value="in_review" {{ old('status', $requestItem->status) === 'in_review' ? 'selected' : '' }}>{{ __('messages.status_in_review') }}</option>
                            <option value="answered" {{ old('status', $requestItem->status) === 'answered' ? 'selected' : '' }}>{{ __('messages.status_answered') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="response" class="form-label">{{ __('messages.response') }}</label>
                        <textarea name="response" id="response" rows="5" class="form-control">{{ old('response', $requestItem->response) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle me-1"></i> {{ __('messages.save_response') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

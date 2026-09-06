@extends('layouts.guest')

@section('page-title', 'Consultation Permis de Construire')
@section('title', 'Consultation Permis de Construire')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Consultation Permis de Construire</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permit-consultation.search') }}">
                        @csrf
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.Request Number') }}</label>
                                <input type="text" name="request_number" class="form-control" value="{{ $request_number ?? '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.CIN') }}</label>
                                <input type="text" name="cin" class="form-control" value="{{ $cin ?? '' }}" required maxlength="8">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.Search') }}</button>
                    </form>
                </div>
            </div>

            @if($citizenRequest !== null)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('messages.Request Details') }}</h4>
                    </div>
                    <div class="card-body">
                        @if($citizenRequest)
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Request Number') }}:</strong>
                                    <p>{{ $citizenRequest->request_number }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Status') }}:</strong>
                                    <p>
                                        <span class="badge {{ $citizenRequest->status === 'completed' ? 'bg-success' : ($citizenRequest->status === 'pending' ? 'bg-warning' : 'bg-info') }}">
                                            {{ $citizenRequest->status }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Service Type') }}:</strong>
                                    <p>{{ $citizenRequest->service ? $citizenRequest->service->getTranslatableContent('name') : '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Priority') }}:</strong>
                                    <p>{{ $citizenRequest->priority }}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Assigned To') }}:</strong>
                                    <p>{{ $citizenRequest->assignedTo ? $citizenRequest->assignedTo->name : '-' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>{{ __('messages.Reference Number') }}:</strong>
                                    <p>{{ $citizenRequest->reference_number ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <strong>{{ __('messages.Description') }}:</strong>
                                <p>{{ $citizenRequest->getTranslatableContent('description') }}</p>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <strong>{{ __('messages.Created At') }}:</strong>
                                    <p>{{ $citizenRequest->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <strong>{{ __('messages.Updated At') }}:</strong>
                                    <p>{{ $citizenRequest->updated_at->format('Y-m-d H:i') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <strong>{{ __('messages.Completed At') }}:</strong>
                                    <p>{{ $citizenRequest->completed_at ? $citizenRequest->completed_at->format('Y-m-d H:i') : '-' }}</p>
                                </div>
                            </div>

                            <h5 class="mb-3">{{ __('messages.Request Timeline') }}</h5>
                            @if($citizenRequest->messages && $citizenRequest->messages->count() > 0)
                                <div class="timeline">
                                    @foreach($citizenRequest->messages as $message)
                                        <div class="card mb-2">
                                            <div class="card-body py-2">
                                                <small class="text-muted">{{ $message->created_at->format('Y-m-d H:i') }}</small>
                                                <p class="mb-0">{{ $message->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">{{ __('messages.No messages available') }}</p>
                            @endif
                        @else
                            <div class="alert alert-info">
                                {{ __('messages.No request found') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('page-title', 'Complaint Details')
@section('title', 'Complaint Details')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="page-header">
    <h1>{{ __('Complaint Details') }}</h1>
    <p class="text-muted">{{ $complaint->complaint_number }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">{{ __('Complaint Information') }}</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>{{ __('Category') }}</th>
                        <td>{{ ucfirst($complaint->category) }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Status') }}</th>
                        <td>
                            <span class="badge {{ $complaint->status === 'new' ? 'bg-danger' : ($complaint->status === 'resolved' ? 'bg-success' : 'bg-warning') }}">
                                {{ ucfirst($complaint->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Priority') }}</th>
                        <td>
                            <span class="badge {{ $complaint->priority === 'high' ? 'bg-danger' : ($complaint->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                {{ ucfirst($complaint->priority) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Location') }}</th>
                        <td>{{ $complaint->location ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Submitted On') }}</th>
                        <td>{{ $complaint->created_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @if($complaint->response)
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Response') }}</h6>
                </div>
                <div class="card-body">
                    <p>{{ $complaint->response }}</p>
                    @if($complaint->resolved_at)
                        <small class="text-muted">{{ __('Resolved on') }}: {{ $complaint->resolved_at->format('d M Y H:i') }}</small>
                    @endif
                </div>
            </div>
        @endif

        @if($complaint->attachments && is_array($complaint->attachments) && count($complaint->attachments) > 0)
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('messages.Attachments') }}</h6>
                </div>
                <div class="card-body">
                    @foreach($complaint->attachments as $attachment)
                        <div class="d-flex align-items-center justify-content-between p-2 border rounded mb-2">
                            <div>
                                <span class="me-2">{{ basename($attachment) }}</span>
                            </div>
                            <a href="{{ Storage::disk('public')->url($attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                                {{ __('messages.view') }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">{{ __('Actions') }}</h6>
            </div>
            <div class="card-body">
                @if($complaint->status === 'new')
                    <form action="{{ route('admin.complaints.assign', $complaint) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="assigned_to" class="form-label">{{ __('Assign To') }}</label>
                            <select class="form-select" id="assigned_to" name="assigned_to">
                                <option value="">{{ __('Select Official') }}</option>
                                @foreach($officials as $official)
                                    <option value="{{ $official->cin }}">{{ $official->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">{{ __('Assign') }}</button>
                    </form>
                @endif

                @if(in_array($complaint->status, ['acknowledged', 'in_investigation']))
                    <form action="{{ route('admin.complaints.respond', $complaint) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="response" class="form-label">{{ __('Response') }}</label>
                            <textarea class="form-control" id="response" name="response" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">{{ __('Respond') }}</button>
                    </form>

                    <form action="{{ route('admin.complaints.close', $complaint) }}" method="POST" class="mb-3">
                        @csrf
                        <button type="submit" class="btn btn-secondary w-100" onclick="return confirm('{{ __('Are you sure you want to close this complaint?') }}')">{{ __('Close Complaint') }}</button>
                    </form>
                @endif

                <a href="{{ route('admin.complaints.index') }}" class="btn btn-outline-secondary w-100">{{ __('Back to List') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

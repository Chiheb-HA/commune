@extends('layouts.admin')

@section('page-title', __('messages.Request Details'))
@section('title', __('messages.Request Details'))

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Request Details') }}</h1>
    <p class="text-muted">{{ $request->request_number }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Request Information') }}</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>{{ __('messages.Service') }}</th>
                        <td>{{ $request->service->name_en ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.Status') }}</th>
                        <td>
                            <span class="badge {{ $request->status === 'pending' ? 'bg-warning' : ($request->status === 'completed' ? 'bg-success' : 'bg-info') }}">
                                {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.Priority') }}</th>
                        <td>
                            <span class="badge {{ $request->priority === 'high' ? 'bg-danger' : ($request->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                {{ ucfirst($request->priority) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.Reference_Number') }}</th>
                        <td>{{ $request->reference_number ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('messages.Submitted On') }}</th>
                        <td>{{ $request->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @if($request->assigned_at)
                    <tr>
                        <th>{{ __('messages.Assigned On') }}</th>
                        <td>{{ $request->assigned_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endif
                    @if($request->completed_at)
                    <tr>
                        <th>{{ __('messages.Completed On') }}</th>
                        <td>{{ $request->completed_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>


        @if($request->notes)
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('messages.Notes') }}</h6>
                </div>
                <div class="card-body">
                    <p>{{ $request->notes }}</p>
                </div>
            </div>
        @endif

        @if($request->documents && $request->documents->count() > 0)
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('messages.Attachments') }}</h6>
                </div>
                <div class="card-body">
                    @foreach($request->documents as $document)
                        <div class="d-flex align-items-center justify-content-between p-2 border rounded mb-2">
                            <div>
                                <span class="me-2">{{ $document->file_name }}</span>
                                <small class="text-muted">({{ $document->file_type }} - {{ number_format($document->file_size / 1024, 2) }} KB)</small>
                            </div>
                            <a href="{{ Storage::disk('public')->url($document->file_path) }}" target="_blank" class="btn btn-sm btn-primary">
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
                <h6 class="mb-0">{{ __('messages.Actions') }}</h6>
            </div>
            <div class="card-body">
                @if($request->status === 'on_hold')
                    <form action="{{ route('admin.requests.assign', $request->id) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="assigned_to" class="form-label">{{ __('messages.Assign To') }}</label>
                            <select class="form-select" id="assigned_to" name="assigned_to">
                                <option value="">{{ __('messages.Select Official') }}</option>
                                @foreach($officials as $official)
                                    <option value="{{ $official->cin }}" {{ $request->assigned_to === $official->cin ? 'selected' : '' }}>{{ $official->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('messages.Save Assignment') }}</button>
                    </form>
                @else
                    <div class="mb-3">
                        <label for="assigned_to" class="form-label">{{ __('messages.Assign To') }}</label>
                        <select class="form-select" id="assigned_to" name="assigned_to" disabled>
                            <option value="">{{ __('messages.Select Official') }}</option>
                            @foreach($officials as $official)
                                <option value="{{ $official->cin }}" {{ $request->assigned_to === $official->cin ? 'selected' : '' }}>{{ $official->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted d-block mt-1">{{ __('messages.Can only assign when status is On Hold') }}</small>
                    </div>
                @endif

                @if(in_array($request->status, ['pending', 'in_progress', 'on_hold']))
                    <form action="{{ route('admin.requests.updateStatus', $request->id) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="status" class="form-label">{{ __('messages.Update Status') }}</label>
                            <select class="form-select" id="status" name="status">
                                <option value="on_hold">{{ __('messages.On Hold') }}</option>
                                <option value="completed">{{ __('messages.Completed') }}</option>
                                <option value="in_progress">{{ __('messages.In Progress') }}</option>
                                <option value="rejected">{{ __('messages.Rejected') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">{{ __('messages.Update Status') }}</button>
                    </form>
                @endif

                <a href="{{ route('admin.requests.index') }}" class="btn btn-outline-secondary w-100">{{ __('messages.Back to List') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

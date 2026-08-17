@extends('layouts.admin')

@section('page-title', 'Request Details')
@section('title', 'Request Details')

@section('content')
<div class="page-header">
    <h1>{{ __('Request Details') }}</h1>
    <p class="text-muted">{{ $request->request_number }}</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="mb-0">{{ __('Request Information') }}</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>{{ __('Service') }}</th>
                        <td>{{ $request->service->name_en ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Status') }}</th>
                        <td>
                            <span class="badge {{ $request->status === 'pending' ? 'bg-warning' : ($request->status === 'completed' ? 'bg-success' : 'bg-info') }}">
                                {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Priority') }}</th>
                        <td>
                            <span class="badge {{ $request->priority === 'high' ? 'bg-danger' : ($request->priority === 'medium' ? 'bg-warning' : 'bg-info') }}">
                                {{ ucfirst($request->priority) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>{{ __('Reference Number') }}</th>
                        <td>{{ $request->reference_number ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Submitted On') }}</th>
                        <td>{{ $request->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @if($request->assigned_at)
                    <tr>
                        <th>{{ __('Assigned On') }}</th>
                        <td>{{ $request->assigned_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endif
                    @if($request->completed_at)
                    <tr>
                        <th>{{ __('Completed On') }}</th>
                        <td>{{ $request->completed_at->format('d M Y H:i') }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>


        @if($request->notes)
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('Notes') }}</h6>
                </div>
                <div class="card-body">
                    <p>{{ $request->notes }}</p>
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
                @if($request->status === 'pending')
                    <form action="{{ route('admin.requests.assign', $request) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="assigned_to" class="form-label">{{ __('Assign To') }}</label>
                            <select class="form-select" id="assigned_to" name="assigned_to">
                                <option value="">{{ __('Select Official') }}</option>
                                @foreach($officials as $official)
                                    <option value="{{ $official->id }}">{{ $official->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">{{ __('Assign') }}</button>
                    </form>
                @endif

                @if(in_array($request->status, ['pending', 'in_progress']))
                    <form action="{{ route('admin.requests.updateStatus', $request) }}" method="POST" class="mb-3">
                        @csrf
                        <div class="mb-2">
                            <label for="status" class="form-label">{{ __('Update Status') }}</label>
                            <select class="form-select" id="status" name="status">
                                <option value="in_progress">{{ __('In Progress') }}</option>
                                <option value="on_hold">{{ __('On Hold') }}</option>
                                <option value="completed">{{ __('Completed') }}</option>
                                <option value="rejected">{{ __('Rejected') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">{{ __('Update Status') }}</button>
                    </form>
                @endif

                <a href="{{ route('admin.requests.index') }}" class="btn btn-outline-secondary w-100">{{ __('Back to List') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

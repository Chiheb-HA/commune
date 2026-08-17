@extends('layouts.app')

@section('title', __('messages.my_requests'))

@section('content')
<div class="container-lg py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('messages.my_requests') }}</h1>
        <a href="{{ route('services.request') }}" class="btn btn-primary">{{ __('messages.new_request') }}</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if($requests->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('messages.request_number') }}</th>
                                <th>{{ __('messages.service') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.priority') }}</th>
                                <th>{{ __('messages.date') }}</th>
                                <th>{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->request_number }}</td>
                                    <td>{{ $request->service->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $request->status === 'completed' ? 'success' : ($request->status === 'pending' ? 'warning' : 'info') }}">
                                            {{ $request->status }}
                                        </span>
                                    </td>
                                    <td>{{ $request->priority }}</td>
                                    <td>{{ $request->created_at->translatedFormat('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('citizen.requests.show', $request) }}" class="btn btn-sm btn-primary">{{ __('messages.view') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $requests->links() }}
            @else
                <p class="text-muted text-center py-4">{{ __('messages.no_requests') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection

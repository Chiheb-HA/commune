@extends('layouts.admin')

@section('page-title', __('messages.council_sessions'))
@section('title', __('messages.council_sessions'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.council_sessions') }}</h1>
    <p class="text-muted">{{ __('messages.manage_council_sessions') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('admin.council-sessions.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.new_council_session') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.Name') }}</th>
                        <th>{{ __('messages.session_date') }}</th>
                        <th>{{ __('messages.type') }}</th>
                        <th>{{ __('messages.Status') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sessions as $session)
                        <tr>
                            <td>{{ $session->title }}</td>
                            <td>{{ $session->session_date->format('Y-m-d') }}</td>
                            <td>{{ __('messages.council_type_' . $session->type) }}</td>
                            <td>{{ __('messages.council_status_' . $session->status) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.council-sessions.edit', $session) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                    @if($session->status === 'upcoming')
                                        <form method="POST" action="{{ route('admin.council-sessions.notify', $session) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-info">{{ __('messages.notify_members') }}</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.council-sessions.destroy', $session) }}" data-confirm="{{ __('messages.Are you sure?') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4">{{ __('messages.no_council_sessions') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
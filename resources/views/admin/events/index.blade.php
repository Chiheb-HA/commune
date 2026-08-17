@extends('layouts.admin')

@section('page-title', __('messages.Events'))
@section('title', __('messages.Events'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Events') }}</h1>
    <p class="text-muted">{{ __('messages.Manage municipal events') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.Create Event') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($events->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Date') }}</th>
                            <th>{{ __('messages.Location') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title_fr ?? $event->title_en ?? 'N/A' }}</td>
                                <td>{{ $event->start_date ? $event->start_date->translatedFormat('d F Y') : 'N/A' }}</td>
                                <td>{{ $event->location ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $event->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.Are you sure?') }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $events->links() }}
        @else
            <p class="text-muted">{{ __('messages.No events found.') }}</p>
        @endif
    </div>
</div>
@endsection

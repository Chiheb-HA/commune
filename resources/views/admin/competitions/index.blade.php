@extends('layouts.admin')

@section('page-title', __('messages.Competitions'))
@section('title', __('messages.Competitions'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Competitions') }}</h1>
    <p class="text-muted">{{ __('messages.Manage competitions') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.competitions.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.New Competition') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($competitions->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Start Date') }}</th>
                            <th>{{ __('messages.End Date') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Active') }}</th>
                            <th>{{ __('messages.Order') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($competitions as $competition)
                            <tr>
                                <td>{{ $competition->title }}</td>
                                <td>{{ $competition->start_date->format('Y-m-d') }}</td>
                                <td>{{ $competition->end_date->format('Y-m-d') }}</td>
                                <td>{{ $competition->status_label }}</td>
                                <td>
                                    <span class="badge {{ $competition->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $competition->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                    </span>
                                </td>
                                <td>{{ $competition->order }}</td>
                                <td>
                                    <a href="{{ route('admin.competitions.edit', $competition) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.competitions.destroy', $competition) }}" method="POST" class="d-inline">
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
            {{ $competitions->links() }}
        @else
            <p class="text-muted">{{ __('messages.No competitions found.') }}</p>
        @endif
    </div>
</div>
@endsection

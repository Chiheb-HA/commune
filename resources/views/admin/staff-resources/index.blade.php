@extends('layouts.admin')

@section('page-title', __('messages.Staff Resources'))
@section('title', __('messages.Staff Resources'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Staff Resources') }}</h1>
    <p class="text-muted">{{ __('messages.Manage staff resources: guides, training, and technical assistance') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.staff-resources.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.New Staff Resource') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($staffResources->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Type') }}</th>
                            <th>{{ __('messages.File Path') }}</th>
                            <th>{{ __('messages.External Link') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffResources as $staffResource)
                            <tr>
                                <td>{{ $staffResource->title }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $staffResource->type_label }}</span>
                                </td>
                                <td>{!! $staffResource->file_path ? '<i class="bi bi-file-earmark"></i>' : '-' !!}</td>
                                <td>{!! $staffResource->external_link ? '<i class="bi bi-link"></i>' : '-' !!}</td>
                                <td>
                                    <span class="badge {{ $staffResource->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $staffResource->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.staff-resources.edit', $staffResource) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.staff-resources.destroy', $staffResource) }}" method="POST" class="d-inline">
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
            {{ $staffResources->links() }}
        @else
            <p class="text-muted">{{ __('messages.No staff resources found.') }}</p>
        @endif
    </div>
</div>
@endsection
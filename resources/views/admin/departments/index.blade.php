@extends('layouts.admin')

@section('page-title', __('messages.Departments'))
@section('title', __('messages.Departments'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Departments') }}</h1>
    <p class="text-muted">{{ __('messages.Manage municipal departments and their responsibilities') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <form method="GET" class="d-inline-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="{{ __('messages.Search...') }}" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Search') }}</button>
                </form>
            </div>
            <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.New Department') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.Name') }}</th>
                        <th>{{ __('messages.Description') }}</th>
                        <th>{{ __('messages.Head Official') }}</th>
                        <th>{{ __('messages.Location') }}</th>
                        <th>{{ __('messages.Status') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $department)
                        <tr>
                            <td>
                                <strong>{{ $department->getTranslatableContent('name') }}</strong>
                            </td>
                            <td>{{ Str::limit($department->getTranslatableContent('description'), 100) }}</td>
                            <td>
                                @if($department->head)
                                    <span class="badge bg-info">{{ $department->head->name }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <small>{{ $department->location }}</small>
                                @if($department->building_number)
                                    <br><small>{{ __('messages.Building') }} {{ $department->building_number }}</small>
                                @endif
                                @if($department->floor)
                                    <br><small>{{ __('messages.Floor') }} {{ $department->floor }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $department->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $department->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.departments.toggle-status', $department) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-warning" title="{{ __('messages.Toggle Status') }}">
                                            <i class="bi bi-power"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" style="display: inline;" data-confirm="{{ __('messages.Are you sure?') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <p class="text-muted mb-0">{{ __('messages.No departments yet.') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

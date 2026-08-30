@extends('layouts.admin')

@section('page-title', __('messages.Municipal Services'))
@section('title', __('messages.Municipal Services'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Municipal Services') }}</h1>
    <p class="text-muted">{{ __('messages.Manage municipal services and their requirements') }}</p>
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
            <a href="{{ route('admin.municipal-services.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.New Service') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.Name') }}</th>
                        <th>{{ __('messages.Description') }}</th>
                        <th>{{ __('messages.Status') }}</th>
                        <th>{{ __('messages.Order') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>
                                <strong>{{ $service->getTranslatableContent('name') }}</strong>
                                <div class="small text-muted">
                                    <i class="bi bi-building"></i> {{ $service->icon }}
                                </div>
                            </td>
                            <td>{{ Str::limit($service->getTranslatableContent('description'), 100) }}</td>
                            <td>
                                <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $service->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                </span>
                            </td>
                            <td>{{ $service->order ?? '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.municipal-services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.municipal-services.toggle-status', $service) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-warning" title="{{ __('messages.Toggle Status') }}">
                                            <i class="bi bi-power"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.municipal-services.destroy', $service) }}" style="display: inline;" data-confirm="{{ __('messages.Are you sure?') }}">
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
                            <td colspan="5" class="text-center py-4">
                                <p class="text-muted mb-0">{{ __('messages.No services yet.') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

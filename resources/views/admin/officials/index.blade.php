@extends('layouts.admin')

@section('page-title', __('messages.Officials'))
@section('title', __('messages.Officials'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Officials') }}</h1>
    <p class="text-muted">{{ __('messages.Manage municipal staff and officials') }}</p>
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
            <a href="{{ route('admin.officials.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.New Official') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.Name') }}</th>
                        <th>{{ __('messages.Position') }}</th>
                        <th>{{ __('messages.Department') }}</th>
                        <th>{{ __('messages.Contact') }}</th>
                        <th>{{ __('messages.Status') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($officials as $official)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($official->photo)
                                        <img src="{{ asset('storage/' . $official->photo) }}" 
                                             alt="{{ $official->user->name }}" 
                                             class="rounded-circle me-2" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" 
                                             style="width: 40px; height: 40px;">
                                            <i class="bi bi-person" style="font-size: 1rem;"></i>
                                        </div>
                                    @endif
                                    <strong>{{ $official->user->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $official->getTranslatableContent('position') }}</td>
                            <td>
                                @if($official->department)
                                    <span class="badge bg-info">{{ $official->department->getTranslatableContent('name') }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <small>{{ $official->phone }}</small><br>
                                <small>{{ $official->email }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $official->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($official->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.officials.edit', $official) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.officials.toggle-status', $official) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-warning" title="{{ __('messages.Toggle Status') }}">
                                            <i class="bi bi-power"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.officials.destroy', $official) }}" style="display: inline;" data-confirm="{{ __('messages.Are you sure?') }}">
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
                                <p class="text-muted mb-0">{{ __('messages.No officials yet.') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

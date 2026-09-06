@extends('layouts.admin')

@section('page-title', __('messages.associations'))
@section('title', __('messages.associations'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.associations') }}</h1>
    <p class="text-muted">{{ __('messages.manage_associations') }}</p>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form method="GET" class="d-inline-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="{{ __('messages.Search...') }}" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">{{ __('messages.Search') }}</button>
            </form>
            <a href="{{ route('admin.associations.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> {{ __('messages.new_association') }}
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('messages.matricule') }}</th>
                        <th>{{ __('messages.Name') }}</th>
                        <th>{{ __('messages.interest_area') }}</th>
                        <th>{{ __('messages.member_count') }}</th>
                        <th>{{ __('messages.Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($associations as $association)
                        <tr>
                            <td>{{ $association->matricule }}</td>
                            <td>{{ $association->name }}</td>
                            <td>{{ $association->interest_area ?: '-' }}</td>
                            <td>{{ $association->member_count ?? '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.associations.edit', $association) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.associations.destroy', $association) }}" data-confirm="{{ __('messages.Are you sure?') }}">
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
                            <td colspan="5" class="text-center py-4">{{ __('messages.no_associations') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
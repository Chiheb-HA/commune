@extends('layouts.admin')

@section('page-title', __('messages.Partnerships'))
@section('title', __('messages.Partnerships'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Partnerships') }}</h1>
    <p class="text-muted">{{ __('messages.Manage partnerships and twinning agreements') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.partnerships.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.New Partnership') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($partnerships->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Partner Country') }}</th>
                            <th>{{ __('messages.Partner City') }}</th>
                            <th>{{ __('messages.Signed Date') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partnerships as $partnership)
                            <tr>
                                <td>{{ $partnership->title }}</td>
                                <td>{{ $partnership->partner_country ?? '-' }}</td>
                                <td>{{ $partnership->partner_city ?? '-' }}</td>
                                <td>{{ $partnership->signed_date ? $partnership->signed_date->format('d/m/Y') : '-' }}</td>
                                <td>
                                    <span class="badge {{ $partnership->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $partnership->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.partnerships.edit', $partnership) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.partnerships.destroy', $partnership) }}" method="POST" class="d-inline">
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
            {{ $partnerships->links() }}
        @else
            <p class="text-muted">{{ __('messages.No partnerships found.') }}</p>
        @endif
    </div>
</div>
@endsection
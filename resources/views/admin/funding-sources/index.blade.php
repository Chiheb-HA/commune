@extends('layouts.admin')

@section('page-title', __('messages.Funding Sources'))
@section('title', __('messages.Funding Sources'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Funding Sources') }}</h1>
    <p class="text-muted">{{ __('messages.Manage funding sources') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.funding-sources.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.New Funding Source') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($fundingSources->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Type') }}</th>
                            <th>{{ __('messages.Amount') }}</th>
                            <th>{{ __('messages.Fiscal Year') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Order') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fundingSources as $fundingSource)
                            <tr>
                                <td>{{ $fundingSource->title }}</td>
                                <td>{{ $fundingSource->type_label }}</td>
                                <td>{{ $fundingSource->amount ? number_format($fundingSource->amount, 2) : '-' }}</td>
                                <td>{{ $fundingSource->fiscal_year ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $fundingSource->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $fundingSource->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                    </span>
                                </td>
                                <td>{{ $fundingSource->order }}</td>
                                <td>
                                    <a href="{{ route('admin.funding-sources.edit', $fundingSource) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.funding-sources.destroy', $fundingSource) }}" method="POST" class="d-inline">
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
            {{ $fundingSources->links() }}
        @else
            <p class="text-muted">{{ __('messages.No funding sources found.') }}</p>
        @endif
    </div>
</div>
@endsection

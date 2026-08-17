@extends('layouts.admin')

@section('page-title', __('messages.Galleries'))
@section('title', __('messages.Galleries'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Galleries') }}</h1>
    <p class="text-muted">{{ __('messages.Manage photo galleries') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.Create Gallery') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($galleries->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Images') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Created At') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->title_fr ?? $gallery->title_en ?? 'N/A' }}</td>
                                <td>{{ $gallery->images_count ?? 0 }}</td>
                                <td>
                                    <span class="badge {{ $gallery->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($gallery->status) }}
                                    </span>
                                </td>
                                <td>{{ $gallery->created_at->translatedFormat('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
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
            {{ $galleries->links() }}
        @else
            <p class="text-muted">{{ __('messages.No galleries found.') }}</p>
        @endif
    </div>
</div>
@endsection

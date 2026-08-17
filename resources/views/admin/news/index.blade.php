@extends('layouts.admin')

@section('page-title', __('messages.News'))
@section('title', __('messages.News'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.News') }}</h1>
    <p class="text-muted">{{ __('messages.Manage municipal news') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.Create News') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($news->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Title') }}</th>
                            <th>{{ __('messages.Published At') }}</th>
                            <th>{{ __('messages.Views') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->title_fr ?? $item->title_en ?? 'N/A' }}</td>
                                <td>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : 'N/A' }}</td>
                                <td>{{ $item->views ?? 0 }}</td>
                                <td>
                                    <span class="badge {{ $item->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="d-inline">
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
            {{ $news->links() }}
        @else
            <p class="text-muted">{{ __('messages.No news found.') }}</p>
        @endif
    </div>
</div>
@endsection

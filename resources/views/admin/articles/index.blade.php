@extends('layouts.admin')

@section('page-title', __('messages.Articles Management'))
@section('title', __('messages.Articles Management'))

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1>{{ __('messages.Articles') }}</h1>
        <p class="text-muted">{{ __('messages.Manage all articles and pages') }}</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> {{ __('messages.New Article') }}
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="{{ __('messages.Search...') }}" value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">{{ __('messages.All Status') }}</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>{{ __('messages.Published') }}</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>{{ __('messages.Draft') }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">{{ __('messages.All Categories') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') === (string)$category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-outline-primary w-100">{{ __('messages.Filter') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- Articles Table -->
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>{{ __('messages.Title') }}</th>
                    <th>{{ __('messages.Category') }}</th>
                    <th>{{ __('messages.Status') }}</th>
                    <th>{{ __('messages.Author') }}</th>
                    <th>{{ __('messages.Date') }}</th>
                    <th style="width: 120px;">{{ __('messages.Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>
                            <strong>{{ $article->title }}</strong><br>
                            <small class="text-muted">{{ $article->slug }}</small>
                        </td>
                        <td>
                            @if($article->category)
                                <span class="badge bg-info">{{ $article->category->name }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($article->published)
                                <span class="badge bg-success">{{ __('messages.Published') }}</span>
                            @else
                                <span class="badge bg-warning">{{ __('messages.Draft') }}</span>
                            @endif
                        </td>
                        <td>{{ $article->author->name ?? 'Admin' }}</td>
                        <td>{{ $article->created_at->translatedFormat('d F Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-primary" title="{{ __('messages.Edit') }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-outline-secondary" title="{{ __('messages.View') }}" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ __('messages.Delete') }}" onclick="return confirm('{{ __('messages.Are you sure?') }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            {{ __('messages.No articles found.') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
@if($articles->hasPages())
    <div class="mt-4">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
@endif
@endsection

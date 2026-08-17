@extends('layouts.admin')

@section('page-title', __('messages.Dashboard'))
@section('title', __('messages.Dashboard'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Dashboard') }}</h1>
    <p class="text-muted">{{ __('messages.Welcomeback, Admin!') }}</p>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.TotalArticles') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_articles'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-file-text" style="font-size: 2rem; color: #3b82f6;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Events') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_events'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-calendar-event" style="font-size: 2rem; color: #10b981;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Citizen Requests') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_requests'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-inbox" style="font-size: 2rem; color: #f59e0b;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Total Users') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_users'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-people" style="font-size: 2rem; color: #ef4444;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Total Complaints') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_complaints'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-exclamation-triangle" style="font-size: 2rem; color: #8b5cf6;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-muted mb-2">{{ __('messages.Total News') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_news'] ?? 0 }}</h3>
                    </div>
                    <i class="bi bi-newspaper" style="font-size: 2rem; color: #06b6d4;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Articles -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Recent Articles') }}</h6>
            </div>
            <div class="card-body p-0">
                @if($recentArticles->count())
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                @foreach($recentArticles as $article)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($article->titre_fr ?? $article->title_fr ?? 'N/A', 40) }}</strong><br>
                                            <small class="text-muted">{{ $article->created_at->translatedFormat('d F Y') }}</small>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge {{ $article->status === 'PUBLISHED' || $article->status === 'published' ? 'bg-success' : 'bg-warning' }}">
                                                {{ $article->status === 'PUBLISHED' || $article->status === 'published' ? __('messages.Published') : __('messages.Draft') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted p-3 mb-0">{{ __('messages.No articles yet.') }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Complaints -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Recent Complaints') }}</h6>
            </div>
            <div class="card-body p-0">
                @if($recentComplaints->count())
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                @foreach($recentComplaints as $complaint)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($complaint->description_fr ?? 'N/A', 40) }}</strong><br>
                                            <small class="text-muted">{{ $complaint->created_at->translatedFormat('d F Y') }}</small>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge bg-{{ $complaint->status === 'new' ? 'danger' : ($complaint->status === 'resolved' ? 'success' : 'warning') }}">
                                                {{ ucfirst($complaint->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted p-3 mb-0">{{ __('messages.No complaints yet.') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-4">
    <!-- Recent Requests -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Recent Requests') }}</h6>
            </div>
            <div class="card-body p-0">
                @if($recentRequests->count())
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <tbody>
                                @foreach($recentRequests as $request)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($request->description_fr ?? 'N/A', 40) }}</strong><br>
                                            <small class="text-muted">{{ $request->created_at->translatedFormat('d F Y') }}</small>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge bg-{{ $request->status === 'pending' ? 'warning' : ($request->status === 'completed' ? 'success' : 'info') }}">
                                                {{ ucfirst($request->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted p-3 mb-0">{{ __('messages.No requests yet.') }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Pending Items -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Pending Items') }}</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-around text-center">
                    <div>
                        <h3 class="text-warning">{{ $stats['pending_complaints'] ?? 0 }}</h3>
                        <small class="text-muted">{{ __('messages.Pending Complaints') }}</small>
                    </div>
                    <div>
                        <h3 class="text-warning">{{ $stats['pending_requests'] ?? 0 }}</h3>
                        <small class="text-muted">{{ __('messages.Pending Requests') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">{{ __('messages.Quick Actions') }}</h6>
            </div>
            <div class="card-body">
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> {{ __('messages.New Article') }}
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> {{ __('messages.New News') }}
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> {{ __('messages.New Event') }}
                    </a>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> {{ __('messages.New Gallery') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

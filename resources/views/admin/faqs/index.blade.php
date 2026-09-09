@extends('layouts.admin')

@section('page-title', __('messages.FAQs'))
@section('title', __('messages.FAQs'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.FAQs') }}</h1>
    <p class="text-muted">{{ __('messages.Manage frequently asked questions') }}</p>
</div>

<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> {{ __('messages.New FAQ') }}
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($faqs->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Question') }}</th>
                            <th>{{ __('messages.Category') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Order') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->category ?? __('messages.uncategorized') }}</td>
                                <td>
                                    <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $faq->is_active ? __('messages.Active') : __('messages.Inactive') }}
                                    </span>
                                </td>
                                <td>{{ $faq->order }}</td>
                                <td>
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline">
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
            {{ $faqs->links() }}
        @else
            <p class="text-muted">{{ __('messages.No FAQs found.') }}</p>
        @endif
    </div>
</div>
@endsection
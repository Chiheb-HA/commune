@extends('layouts.admin')

@section('page-title', __('messages.Newsletter Subscribers'))
@section('title', __('messages.Newsletter Subscribers'))

@section('content')
<div class="page-header">
    <h1>{{ __('messages.Newsletter Subscribers') }}</h1>
    <p class="text-muted">{{ __('messages.Manage newsletter subscribers') }}</p>
</div>

<div class="card">
    <div class="card-body">
        @if($subscribers->count())
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('messages.Email') }}</th>
                            <th>{{ __('messages.Status') }}</th>
                            <th>{{ __('messages.Subscribed At') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <span class="badge {{ $subscriber->is_confirmed ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $subscriber->is_confirmed ? __('messages.Confirmed') : __('messages.Pending') }}
                                    </span>
                                </td>
                                <td>{{ $subscriber->subscribed_at ? $subscriber->subscribed_at->format('Y-m-d H:i') : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $subscribers->links() }}
        @else
            <p class="text-muted">{{ __('messages.No subscribers found.') }}</p>
        @endif
    </div>
</div>
@endsection

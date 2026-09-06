@extends('layouts.app')

@section('title', __('messages.associations'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.associations') }}</h1>
    <p class="lead mb-5">{{ __('messages.associations_description') }}</p>

    <form method="GET" class="row g-3 mb-5">
        <div class="col-sm-8 col-md-6">
            <label for="association-search" class="form-label">{{ __('messages.search') }}</label>
            <input id="association-search" type="search" name="search" class="form-control" value="{{ $search }}" placeholder="{{ __('messages.search_associations') }}">
        </div>
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary">{{ __('messages.search') }}</button>
        </div>
    </form>

    <div class="row g-4">
        @forelse($associations as $association)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title">{{ $association->name }}</h2>
                        @if($association->interest_area)
                            <p class="card-text text-muted">{{ $association->interest_area }}</p>
                        @endif
                        <p class="small mb-0"><strong>{{ __('messages.matricule') }}:</strong> {{ $association->matricule }}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('associations.show', $association) }}" class="btn btn-sm btn-primary">{{ __('messages.view_details') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">{{ __('messages.no_associations') }}</div>
            </div>
        @endforelse
    </div>

    @if($associations->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $associations->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
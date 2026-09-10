@extends('layouts.app')

@section('title', __('messages.downloadable_forms'))

@section('content')
<div class="container-lg py-5"><h1 class="mb-4">{{ __('messages.downloadable_forms') }}</h1><p class="lead text-muted">{{ __('messages.downloadable_forms_description') }}</p><div class="list-group">@forelse($forms as $form)<div class="list-group-item d-flex justify-content-between align-items-center"><div><h5 class="mb-1">{{ $form->title }}</h5>@if($form->description)<p class="mb-0 text-muted">{{ $form->description }}</p>@endif</div><a href="{{ asset('storage/'.$form->file_path) }}" class="btn btn-primary" download><i class="bi bi-download"></i> {{ __('messages.download') }}</a></div>@empty<div class="alert alert-info">{{ __('messages.no_downloadable_forms') }}</div>@endforelse</div></div>
@endsection

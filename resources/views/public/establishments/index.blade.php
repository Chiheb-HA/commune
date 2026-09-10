@extends('layouts.app')

@section('title', __('messages.establishments'))

@section('content')
<div class="container-lg py-5"><h1 class="mb-4">{{ __('messages.establishments') }}</h1><p class="lead text-muted">{{ __('messages.establishments_description') }}</p><div class="row g-4">@forelse($establishments as $establishment)<div class="col-md-6 col-lg-4"><article class="card h-100"><div class="card-body"><h5>{{ $establishment->name }}</h5>@if($establishment->type)<p class="text-muted mb-2">{{ $establishment->type }}</p>@endif@if($establishment->address)<p><i class="bi bi-geo-alt"></i> {{ $establishment->address }}</p>@endif@if($establishment->phone)<p class="mb-0"><i class="bi bi-telephone"></i> <a href="tel:{{ $establishment->phone }}">{{ $establishment->phone }}</a></p>@endif</div></article></div>@empty<div class="col-12"><div class="alert alert-info">{{ __('messages.no_establishments') }}</div></div>@endforelse</div></div>
@endsection

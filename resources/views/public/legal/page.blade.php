@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0">{{ $title }}</h1>
                </div>
                <div class="card-body">
                    @if($content)
                        <div class="legal-content">
                            {!! $content !!}
                        </div>
                    @else
                        <div class="alert alert-info">
                            {{ __('messages.No content available') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

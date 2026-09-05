@extends('layouts.app')

@section('title', __('messages.sitemap_title'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-5">{{ __('messages.sitemap_title') }}</h1>

    <div class="row g-4">
        @foreach($sections as $section => $links)
            <div class="col-md-6 col-lg-4">
                <section aria-labelledby="sitemap-{{ Str::slug($section) }}">
                    <h2 id="sitemap-{{ Str::slug($section) }}" class="h5 mb-3">{{ $section }}</h2>
                    <ul class="list-unstyled">
                        @foreach($links as [$routeName, $label])
                            <li class="mb-2"><a href="{{ route($routeName) }}">{{ $label }}</a></li>
                        @endforeach
                    </ul>
                </section>
            </div>
        @endforeach
    </div>
</div>
@endsection
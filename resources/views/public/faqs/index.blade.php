@extends('layouts.app')

@section('title', __('messages.FAQs'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.FAQs') }}</h1>
    <p class="lead text-muted mb-5">{{ __('messages.Frequently asked questions about our services') }}</p>

    @forelse($faqs as $category => $categoryFaqs)
        <div class="mb-5">
            <h3 class="mb-3">{{ $category ?? __('messages.uncategorized') }}</h3>
            <div class="accordion" id="accordion-{{ Str::slug($category ?? 'uncategorized') }}">
                @foreach($categoryFaqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordion-{{ Str::slug($category ?? 'uncategorized') }}">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            {{ __('messages.No FAQs available at the moment.') }}
        </div>
    @endforelse
</div>
@endsection
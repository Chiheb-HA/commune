@extends('layouts.app')

@section('title', __('messages.emergency_contacts'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.emergency_contacts') }}</h1>
    <p class="lead mb-5">{{ __('messages.emergency_contacts_description') }}</p>

    @forelse($contacts as $type => $typeContacts)
        <section class="mb-5" aria-labelledby="contact-type-{{ Str::slug($type) }}">
            <h2 id="contact-type-{{ Str::slug($type) }}" class="h4 mb-3">{{ $type }}</h2>
            <div class="row g-4">
                @foreach($typeContacts as $contact)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="h5 card-title">{{ $contact->name }}</h3>
                                @if($contact->phone)
                                    <a href="tel:{{ $contact->phone }}" class="d-block fs-5 py-2">
                                        <i class="bi bi-telephone me-2" aria-hidden="true"></i>{{ $contact->phone }}
                                    </a>
                                @endif
                                @if($contact->extension)
                                    <p class="mb-2"><strong>{{ __('messages.extension') }}:</strong> {{ $contact->extension }}</p>
                                @endif
                                @if($contact->email)
                                    <a href="mailto:{{ $contact->email }}" class="d-block text-break">
                                        <i class="bi bi-envelope me-2" aria-hidden="true"></i>{{ $contact->email }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @empty
        <div class="alert alert-info">{{ __('messages.no_emergency_contacts') }}</div>
    @endforelse
</div>
@endsection
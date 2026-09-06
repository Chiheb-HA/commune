@extends('layouts.app')

@section('title', $association->name)

@section('content')
<div class="container-lg py-5">
    <a href="{{ route('associations.index') }}" class="btn btn-outline-secondary mb-4">{{ __('messages.associations') }}</a>
    <h1 class="mb-4">{{ $association->name }}</h1>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-5">{{ __('messages.matricule') }}</dt>
                        <dd class="col-sm-7">{{ $association->matricule }}</dd>
                        @if($association->authorization_number)
                            <dt class="col-sm-5">{{ __('messages.authorization_number') }}</dt>
                            <dd class="col-sm-7">{{ $association->authorization_number }}</dd>
                        @endif
                        @if($association->authorization_date)
                            <dt class="col-sm-5">{{ __('messages.authorization_date') }}</dt>
                            <dd class="col-sm-7">{{ $association->authorization_date->translatedFormat('d F Y') }}</dd>
                        @endif
                        @if($association->interest_area)
                            <dt class="col-sm-5">{{ __('messages.interest_area') }}</dt>
                            <dd class="col-sm-7">{{ $association->interest_area }}</dd>
                        @endif
                        @if($association->correspondence_address)
                            <dt class="col-sm-5">{{ __('messages.correspondence_address') }}</dt>
                            <dd class="col-sm-7">{{ $association->correspondence_address }}</dd>
                        @endif
                        @if($association->member_count !== null)
                            <dt class="col-sm-5">{{ __('messages.member_count') }}</dt>
                            <dd class="col-sm-7">{{ $association->member_count }}</dd>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="h5">{{ __('messages.contact_information') }}</h2>
                    @if($association->email)
                        <p><a href="mailto:{{ $association->email }}">{{ $association->email }}</a></p>
                    @endif
                    @if($association->president_name)
                        <p><strong>{{ __('messages.president') }}:</strong> {{ $association->president_name }}</p>
                    @endif
                    @if($association->president_phone)
                        <p><a href="tel:{{ $association->president_phone }}">{{ $association->president_phone }}</a></p>
                    @endif
                    @if($association->contact_person_name)
                        <p><strong>{{ __('messages.contact_person') }}:</strong> {{ $association->contact_person_name }}</p>
                    @endif
                    @if($association->contact_person_phone)
                        <p><a href="tel:{{ $association->contact_person_phone }}">{{ $association->contact_person_phone }}</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
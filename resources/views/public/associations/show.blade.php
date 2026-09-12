@extends('layouts.app')

@section('title', $association->name)

@section('content')
<div class="container-lg py-5">
    <a href="{{ route('associations.index') }}" class="btn btn-outline-secondary mb-4">{{ __('messages.associations') }}</a>
    <h1 class="mb-4">{{ $association->name }}</h1>

    <div class="row g-4 mb-5">
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
                    @if($association->president_mobile)
                        <p><strong>{{ __('messages.mobile') }}:</strong> <a href="tel:{{ $association->president_mobile }}">{{ $association->president_mobile }}</a></p>
                    @endif
                    @if($association->contact_person_name)
                        <p><strong>{{ __('messages.contact_person') }}:</strong> {{ $association->contact_person_name }}</p>
                    @endif
                    @if($association->contact_person_phone)
                        <p><a href="tel:{{ $association->contact_person_phone }}">{{ $association->contact_person_phone }}</a></p>
                    @endif
                    @if($association->contact_person_mobile)
                        <p><strong>{{ __('messages.mobile') }}:</strong> <a href="tel:{{ $association->contact_person_mobile }}">{{ $association->contact_person_mobile }}</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Request submission & history workflow -->
    <div class="row g-4">
        <!-- Submit Request Form -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0"><i class="bi bi-send me-2"></i>{{ __('messages.submit_association_request') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('associations.requests.store', $association) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label">{{ __('messages.subject') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('messages.description') }} <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-paperclip me-1"></i> {{ __('messages.send_request') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Request History List -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h3 class="h5 mb-0"><i class="bi bi-clock-history me-2"></i>{{ __('messages.requests_history') }}</h3>
                </div>
                <div class="card-body">
                    @forelse($association->requests as $req)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h4 class="h6 text-primary mb-0">
                                    {{ $req->getTranslatableContent('subject') ?? $req->subject_fr ?? $req->subject_en ?? $req->subject_ar ?? __('messages.no_subject') }}
                                </h4>
                                @if($req->status === 'answered')
                                    <span class="badge bg-success">{{ __('messages.status_answered') }}</span>
                                @elseif($req->status === 'in_review')
                                    <span class="badge bg-warning text-dark">{{ __('messages.status_in_review') }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ __('messages.status_pending') }}</span>
                                @endif
                            </div>
                            <p class="small text-muted mb-2">{{ $req->description }}</p>
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-calendar3"></i> {{ $req->created_at->translatedFormat('d F Y, H:i') }}
                            </small>

                            @if($req->response)
                                <div class="alert alert-info py-2 px-3 mb-0 mt-2">
                                    <strong class="d-block small"><i class="bi bi-reply-fill me-1"></i>{{ __('messages.municipality_response') }}:</strong>
                                    <span class="small">{{ $req->response }}</span>
                                    @if($req->responded_at)
                                        <div class="text-muted text-end" style="font-size: 0.75rem;">
                                            {{ $req->responded_at->translatedFormat('d F Y, H:i') }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-muted text-center py-3 mb-0">{{ __('messages.no_association_requests') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', __('messages.Funding Sources'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.Funding Sources') }}</h1>
    <p class="lead text-muted mb-5">{{ __('messages.funding_sources_description') }}</p>

    @forelse($fundingSources as $type => $sources)
        <div class="mb-5">
            <h3 class="mb-4">{{ \App\Models\FundingSource::getTypeLabel($type) }}</h3>
            <div class="row g-4">
                @foreach($sources as $fundingSource)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $fundingSource->title }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($fundingSource->description, 150) }}</p>
                                @if($fundingSource->amount)
                                    <div class="mb-2">
                                        <span class="badge bg-primary">{{ number_format($fundingSource->amount, 2) }}</span>
                                    </div>
                                @endif
                                @if($fundingSource->fiscal_year)
                                    <small class="text-muted">
                                        <i class="bi bi-calendar"></i> {{ $fundingSource->fiscal_year }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            {{ __('messages.No funding sources available at the moment.') }}
        </div>
    @endforelse
</div>
@endsection

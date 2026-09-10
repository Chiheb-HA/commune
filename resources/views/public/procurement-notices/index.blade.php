```blade
@extends('layouts.app')

@section('title', __('Messages.Procurement Notices'))

@section('content')
    <div class="container-lg py-5">

        {{-- Page title --}}
        <h1 class="mb-4">
            {{ __('Messages.Procurement Notices') }}
        </h1>

        {{-- Filter --}}
        <form method="GET" class="row g-2 mb-4">
            <div class="col-md-4">
                <select name="type" class="form-select">
                    <option value="">
                        {{ __('Messages.All types') }}
                    </option>

                    @foreach ([
                        'pam' => 'PAM',
                        'appel_offres' => 'Appel d’offres',
                        'resultat_designation' => 'Résultat de désignation',
                    ] as $value => $label)
                        <option
                            value="{{ $value }}"
                            @selected(request('type') === $value)
                        >
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Messages.Filter') }}
                </button>
            </div>
        </form>

        {{-- Procurement notices --}}
        <div class="row g-4">
            @forelse ($notices as $notice)
                <div class="col-md-6">
                    <article class="card h-100">
                        <div class="card-body">

                            {{-- Notice type --}}
                            <span class="badge bg-secondary mb-2">
                                {{ $notice->type_label }}
                            </span>

                            {{-- Title --}}
                            <h5>
                                {{ $notice->title }}
                            </h5>

                            {{-- Description --}}
                            <p class="text-muted">
                                {{ Str::limit($notice->description, 180) }}
                            </p>

                            {{-- Dates --}}
                            <small class="text-muted">
                                {{ $notice->publication_date->format('d/m/Y') }}

                                @if ($notice->deadline_date)
                                    · {{ __('Messages.Deadline') }}:
                                    {{ $notice->deadline_date->format('d/m/Y') }}
                                @endif
                            </small>

                            {{-- Attachment --}}
                            @if ($notice->attachment_path)
                                <div class="mt-3">
                                    <a
                                        href="{{ asset($notice->attachment_path) }}"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        {{ __('Messages.Download') }}
                                    </a>
                                </div>
                            @endif

                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        {{ __('Messages.No procurement notices available.') }}
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($notices->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $notices->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
@endsection
```

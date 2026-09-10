@extends('layouts.app')

@section('title', __('messages.officials'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.staff_directory') }}</h1>
    <p class="lead mb-5">{{ __('messages.staff_directory_description') }}</p>
    <a href="{{ route('officials.export') }}" class="btn btn-outline-primary mb-4"><i class="bi bi-download"></i> {{ __('messages.export_csv') }}</a>
    
    @forelse($departments as $department)
        <div class="mb-5">
            <h3 class="mb-4">{{ $department->getTranslatableContent('name') }}</h3>
            
            <div class="row g-4">
                @php
                    $departmentOfficials = $officials->where('department_id', $department->id);
                @endphp
                
                @forelse($departmentOfficials as $official)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    @if($official->photo)
                                        <img src="{{ asset('storage/' . $official->photo) }}" 
                                             alt="{{ $official->user->name ?? 'Official' }}" 
                                             class="rounded-circle me-3" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-person" style="font-size: 1.5rem;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h5 class="card-title mb-1">{{ $official->user->name ?? 'N/A' }}</h5>
                                        <p class="card-text text-muted small mb-0">{{ $official->getTranslatableContent('position') }}</p>
                                    </div>
                                </div>
                                
                                @if($official->phone || $official->email)
                                    <div class="mt-3">
                                        <small class="text-muted">
                                            @if($official->phone)
                                                <div><i class="bi bi-telephone"></i> {{ $official->phone }}</div>
                                            @endif
                                            @if($official->email)
                                                <div><i class="bi bi-envelope"></i> {{ $official->email }}</div>
                                            @endif
                                        </small>
                                    </div>
                                @endif
                                
                                @if($official->office_location || $official->office_number)
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="bi bi-building"></i> 
                                            {{ $official->office_location }}
                                            @if($official->office_number)
                                                {{ __('messages.office') }} {{ $official->office_number }}
                                            @endif
                                        </small>
                                    </div>
                                @endif
                                
                                @if($official->getTranslatableContent('bio'))
                                    <div class="mt-3">
                                        <p class="small text-muted mb-0">{{ Str::limit($official->getTranslatableContent('bio'), 100) }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">{{ __('messages.no_officials_in_department') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            {{ __('messages.no_departments_available') }}
        </div>
    @endforelse
</div>
@endsection

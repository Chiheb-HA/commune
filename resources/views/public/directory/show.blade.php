@extends('layouts.app')

@section('title', $department->name)

@section('content')
<div class="container-lg py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('directory.index') }}">{{ __('messages.organizational_chart') }}</a></li>
            <li class="breadcrumb-item active">{{ $department->name }}</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Department Header -->
            <div class="mb-5">
                <h1 class="mb-3">{{ $department->name }}</h1>
                <div class="text-muted mb-4">
                    @if($department->head)
                        <p class="mb-2">
                            <strong>{{ __('messages.department_head') }}:</strong> 
                            {{ $department->head->name ?? 'N/A' }}
                        </p>
                    @endif
                    
                    @if($department->phone)
                        <p class="mb-2">
                            <i class="bi bi-telephone"></i> {{ $department->phone }}
                        </p>
                    @endif
                    
                    @if($department->email)
                        <p class="mb-2">
                            <i class="bi bi-envelope"></i> {{ $department->email }}
                        </p>
                    @endif
                    
                    @if($department->location)
                        <p class="mb-2">
                            <i class="bi bi-geo-alt"></i> {{ $department->location }}
                            @if($department->building_number)
                                {{ $department->building_number }}
                            @endif
                            @if($department->floor)
                                {{ __('messages.floor') }} {{ $department->floor }}
                            @endif
                        </p>
                    @endif
                </div>
            </div>
            
            <!-- Department Description -->
            @if($department->description_fr || $department->description_en || $department->description_ar)
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ __('messages.about_department') }}</h5>
                        <p>{{ $department->description_fr ?? $department->description_en ?? $department->description_ar }}</p>
                        
                        @if($department->responsibilities_fr || $department->responsibilities_en || $department->responsibilities_ar)
                            <h6 class="mt-4 mb-2">{{ __('messages.responsibilities') }}</h6>
                            <p>{{ $department->responsibilities_fr ?? $department->responsibilities_en ?? $department->responsibilities_ar }}</p>
                        @endif
                    </div>
                </div>
            @endif
            
            <!-- Opening Hours -->
            @if($department->openingHours && $department->openingHours->count())
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ __('messages.opening_hours') }}</h5>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.day') }}</th>
                                        <th>{{ __('messages.hours') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($department->openingHours as $hour)
                                        <tr>
                                            <td>{{ __('messages.day_' . strtolower($hour->day)) }}</td>
                                            <td>{{ $hour->open_time }} - {{ $hour->close_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Officials -->
            @if($department->officials && $department->officials->count())
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">{{ __('messages.department_officials') }}</h5>
                        <div class="row g-4">
                            @foreach($department->officials as $official)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        @if($official->photo)
                                            <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->user->name ?? 'N/A' }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                                <i class="bi bi-person text-white"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-1">{{ $official->user->name ?? 'N/A' }}</h6>
                                            <p class="small text-muted mb-1">{{ $official->position }}</p>
                                            @if($official->phone)
                                                <p class="small mb-0">
                                                    <i class="bi bi-telephone"></i> {{ $official->phone }}
                                                </p>
                                            @endif
                                            @if($official->email)
                                                <p class="small mb-0">
                                                    <i class="bi bi-envelope"></i> {{ $official->email }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Contact Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">{{ __('messages.contact_info') }}</h6>
                </div>
                <div class="card-body">
                    @if($department->phone)
                        <p class="mb-2">
                            <i class="bi bi-telephone me-2"></i> {{ $department->phone }}
                        </p>
                    @endif
                    @if($department->email)
                        <p class="mb-2">
                            <i class="bi bi-envelope me-2"></i> {{ $department->email }}
                        </p>
                    @endif
                    @if($department->location)
                        <p class="mb-0">
                            <i class="bi bi-geo-alt me-2"></i> {{ $department->location }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
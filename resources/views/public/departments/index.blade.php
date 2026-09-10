@extends('layouts.app')

@section('title', __('messages.departments'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.departments') }}</h1>
    <p class="lead mb-5">{{ __('messages.departments_description') }}</p>
        <a href="{{ route('departments.export') }}" class="btn btn-outline-primary mb-4"><i class="bi bi-download"></i> {{ __('messages.export_csv') }}</a>
    
    <div class="row g-4">
        @forelse($departments as $department)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $department->getTranslatableContent('name') }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($department->getTranslatableContent('description'), 150) }}</p>
                        
                        @if($department->head)
                            <div class="mt-3 p-3 bg-light rounded">
                                <strong>{{ __('messages.head_official') }}:</strong>
                                <div class="mt-1">
                                    <div class="fw-bold">{{ $department->head->name }}</div>
                                    @if($department->head->email)
                                        <div class="small text-muted">
                                            <i class="bi bi-envelope"></i> {{ $department->head->email }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        
                        @if($department->phone || $department->email)
                            <div class="mt-3">
                                <small class="text-muted">
                                    @if($department->phone)
                                        <div><i class="bi bi-telephone"></i> {{ $department->phone }}</div>
                                    @endif
                                    @if($department->email)
                                        <div><i class="bi bi-envelope"></i> {{ $department->email }}</div>
                                    @endif
                                </small>
                            </div>
                        @endif
                        
                        @if($department->location)
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> {{ $department->location }}
                                    @if($department->building_number)
                                        {{ __('messages.building') }} {{ $department->building_number }}
                                    @endif
                                    @if($department->floor)
                                        {{ __('messages.floor') }} {{ $department->floor }}
                                    @endif
                                </small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    {{ __('messages.no_departments_available') }}
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

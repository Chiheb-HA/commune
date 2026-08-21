@extends('layouts.app')

@section('title', __('messages.organizational_chart'))

@section('content')
<div class="container-lg py-5">
    <h1 class="mb-4">{{ __('messages.organizational_chart') }}</h1>
    <p class="text-muted mb-5">{{ __('messages.organizational_chart_description') }}</p>
    
    <div class="row g-4">
        @forelse($departments as $department)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $department->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($department->description_fr ?? $department->description_en ?? $department->description_ar ?? '', 100) }}</p>
                        
                        @if($department->head)
                            <p class="small mb-2">
                                <strong>{{ __('messages.department_head') }}:</strong> 
                                {{ $department->head->name ?? 'N/A' }}
                            </p>
                        @endif
                        
                        @if($department->phone)
                            <p class="small mb-2">
                                <i class="bi bi-telephone"></i> {{ $department->phone }}
                            </p>
                        @endif
                        
                        @if($department->email)
                            <p class="small mb-3">
                                <i class="bi bi-envelope"></i> {{ $department->email }}
                            </p>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('directory.show', $department->slug) }}" class="btn btn-sm btn-primary">
                            {{ __('messages.view_details') }}
                        </a>
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
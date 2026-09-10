@extends('layouts.admin')

@section('page-title', __('messages.establishments'))
@section('title', __('messages.establishments'))

@section('content')
<div class="page-header"><h1>{{ __('messages.establishments') }}</h1><p class="text-muted">{{ __('messages.manage_establishments') }}</p></div>
<div class="card mb-4"><div class="card-body"><a href="{{ route('admin.establishments.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> {{ __('messages.new_establishment') }}</a></div></div>
<div class="card"><div class="card-body">@if($establishments->count())<div class="table-responsive"><table class="table table-hover"><thead><tr><th>{{ __('messages.name') }}</th><th>{{ __('messages.type') }}</th><th>{{ __('messages.phone') }}</th><th>{{ __('messages.active') }}</th><th>{{ __('messages.order') }}</th><th>{{ __('messages.actions') }}</th></tr></thead><tbody>@foreach($establishments as $establishment)<tr><td>{{ $establishment->name }}</td><td>{{ $establishment->type ?: '-' }}</td><td>{{ $establishment->phone ?: '-' }}</td><td>{{ $establishment->is_active ? __('messages.yes') : __('messages.no') }}</td><td>{{ $establishment->order }}</td><td><a href="{{ route('admin.establishments.edit', $establishment) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.establishments.destroy', $establishment) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.Are you sure?') }}')"><i class="bi bi-trash"></i></button></form></td></tr>@endforeach</tbody></table></div>{{ $establishments->links() }}@else<p class="text-muted">{{ __('messages.no_establishments') }}</p>@endif</div></div>
@endsection

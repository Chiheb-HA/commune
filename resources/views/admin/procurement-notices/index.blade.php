@extends('layouts.admin')

@section('page-title', 'Procurement Notices')
@section('title', 'Procurement Notices')

@section('content')
<div class="page-header"><h1>{{ __('Procurement Notices') }}</h1></div>
<div class="card mb-4"><div class="card-body"><a href="{{ route('admin.procurement-notices.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> {{ __('New Notice') }}</a></div></div>
<div class="card"><div class="card-body">
@if($notices->count())
<div class="table-responsive"><table class="table table-hover"><thead><tr><th>{{ __('Title') }}</th><th>{{ __('Type') }}</th><th>{{ __('Publication Date') }}</th><th>{{ __('Active') }}</th><th>{{ __('Actions') }}</th></tr></thead><tbody>
@foreach($notices as $notice)<tr><td>{{ $notice->title }}</td><td>{{ $notice->type_label }}</td><td>{{ $notice->publication_date->format('Y-m-d') }}</td><td>{{ $notice->is_active ? __('Active') : __('Inactive') }}</td><td><a href="{{ route('admin.procurement-notices.edit', $notice) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.procurement-notices.destroy', $notice) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')"><i class="bi bi-trash"></i></button></form></td></tr>@endforeach
</tbody></table></div>{{ $notices->links() }}
@else<p class="text-muted">{{ __('No procurement notices found.') }}</p>@endif
</div></div>
@endsection

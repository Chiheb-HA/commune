@extends('layouts.admin')

@section('page-title', isset($association) ? __('messages.edit_association') : __('messages.new_association'))
@section('title', isset($association) ? __('messages.edit_association') : __('messages.new_association'))

@section('content')
<div class="page-header">
    <h1>{{ isset($association) ? __('messages.edit_association') : __('messages.new_association') }}</h1>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ isset($association) ? route('admin.associations.update', $association) : route('admin.associations.store') }}">
            @csrf
            @if(isset($association)) @method('PUT') @endif

            <div class="row g-3">
                @foreach([
                    ['matricule', __('messages.matricule'), 'text'],
                    ['name', __('messages.Name'), 'text'],
                    ['authorization_number', __('messages.authorization_number'), 'text'],
                    ['authorization_date', __('messages.authorization_date'), 'date'],
                    ['interest_area', __('messages.interest_area'), 'text'],
                    ['email', __('messages.email'), 'email'],
                    ['president_name', __('messages.president'), 'text'],
                    ['president_phone', __('messages.phone'), 'text'],
                    ['president_fax', __('messages.president_fax'), 'text'],
                    ['contact_person_name', __('messages.contact_person'), 'text'],
                    ['contact_person_role', __('messages.contact_person_role'), 'text'],
                    ['contact_person_phone', __('messages.phone'), 'text'],
                    ['member_count', __('messages.member_count'), 'number'],
                ] as [$field, $label, $type])
                    <div class="col-md-6">
                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                        <input type="{{ $type }}" id="{{ $field }}" name="{{ $field }}" class="form-control" value="{{ old($field, $association->{$field} ?? '') }}" @if(in_array($field, ['matricule', 'name'])) required @endif>
                    </div>
                @endforeach
                <div class="col-12">
                    <label for="correspondence_address" class="form-label">{{ __('messages.correspondence_address') }}</label>
                    <textarea id="correspondence_address" name="correspondence_address" class="form-control" rows="3">{{ old('correspondence_address', $association->correspondence_address ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
                <a href="{{ route('admin.associations.index') }}" class="btn btn-secondary">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
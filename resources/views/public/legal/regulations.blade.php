@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container py-5"><div class="row"><div class="col-12"><h1>{{ $title }}</h1><div class="card mt-4"><div class="card-body"><p>{{ $content }}</p></div></div></div></div></div>
@endsection

@extends('layouts/app', ['title' => 'Espace membre'])

@section ('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1> hello </h1>

@stop
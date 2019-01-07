@extends('layouts.app')

@section ('content')

<ul>
	<li><a href="{{ route('users') }}"> Utilisateurs </a> </li>
	<li> <a href="{{ route('gestion.places') }}"> Places </a> </li>
	<li> <a href="{{ route ('listAttente') }}"> Liste d'attente </a> </li>
</ul>

@stop
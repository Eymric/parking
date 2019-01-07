@extends('layouts.app')


@section ('content')
@php 
	use App\Place; 
	use App\Reserve;
	$reservations = Reserve::all();
@endphp

	@if(auth()->user()->rang > 0)
		<h4> Vous êtes placer en file d'attente, votre place dans la file est: {{ auth()->user()->rang }} </h4>
	@else
		<h1> Nombre de places disponibles : {{ $nbPlace = Place::where('etat', true)->count() }}<h1>
			@endif
	@foreach($reservations as $reservation) 
		@if(auth()->user()->id_user == $reservation->idUser)
		<h2>Vous avez déjà une place de parking.</h2>
		@else
		@php
		$nbPlace = Place::where('etat', true)->count();@endphp
		@if ($nbPlace > 0)
		{{-- place dispo --}}
			<h4>Vous souhaitez reserver une place de parking. Votre période pour cette place sera estimé par l'administrateur.</h4>
<a href="{{route ('info.reservation')}}"><button class="btn btn-success"> Valider</button></a>
		@else @if(!auth()->user()->rang > 0))
		{{-- Place non dispo --}}
			<h4>Il n'y a pas de places disponible, vous serez dans la file d'attente jusqu'à ce qu'une place se libère. </h4>
			<a href="{{route ('attente')}}"><button class="btn btn-success"> Valider</button></a>
			@endif
		@endif

		
		
	@endif
@endforeach
		<a href="{{url('/')}}"><button class="btn btn-success"> Retour</button></a>

@endsection	
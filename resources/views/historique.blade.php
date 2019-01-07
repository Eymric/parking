@extends ('layouts.app')

@section('content')

@php
$reservations = App\Reserver::whereidPlace($idPlace);
dd($reservations);
@endphp

<h1>Historique de la place : $numPlace</h1>
 {{-- {{$user = App\User::find(1)}} --}}
<table class="table table-bordered">
	<tr>
		<th>
			Prenom
		</th> 
		<th>
			Nom
		</th> 
		<th>	
			Date d'attribution
		</th> 
		<th>	
			Date d'expiration
		</th>
		<th>
			Etat actuel
		</th>
	</tr>
	<tr>
		@foreach ($reservation as $reservation) 
		@php
			$user = User::whereidUser($reservation->idUser)->first();
		@endphp

		<td> 
			{{ $user->prenom }} 
		</td> 
		<td>
			{{ $user->nom }}
		</td>
		<td>
			{{ $reservation->debutPeriode }}
		</td> 
		<td>
			{{ $reservation->finPeriode }}
		</td> 
    </tr>
    
    @endforeach
</table>

@stop
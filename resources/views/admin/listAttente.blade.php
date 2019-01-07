@extends ('layouts.app')

@section('content')

{{-- @php
$reservations = App\Reserver::whereidPlace($idPlace);
dd($reservations);******
@endphp --}}

<h1>Liste d'attentes utilisateurs</h1>
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
			Rang dans la file d'attente
		</th> 
	</tr>
	<tr>
		
		@php
		$users = App\User::all();
		$users = $users->where('rang', '>', 0);
		@endphp

		@foreach ($users as $user) 
		<td> 
			{{ $user->prenom }} 
		</td> 
		<td>
			{{ $user->nom }}
		</td>
		<td>
			{{ $user->rang }}
		</td> 
    </tr>
    
    @endforeach
</table>

@stop
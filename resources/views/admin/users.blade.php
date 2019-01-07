@extends ('layouts.app')

@section('content')

@php
$users = App\User::all();
@endphp

<h1>Gestion des utilisateurs</h1>
{{-- {{$user = App\User::find(1)}} --}}
<table class="table table-bordered">
	<tr>
		<th>
			Pseudo
		</th> 
		<th>
			Prenom
		</th> 
		<th>
			Nom
		</th> 
		<th>	
			Email
		</th> 
		<th>	
			Ligue
		</th>
		<th>
			Compte valide
		</th>
	</tr>
		<tr>
		@foreach ($users as $user) 

		<td> 
			{{ $user->pseudo }} 
		</td> 
		<td> 
			{{ $user->prenom }} 
		</td> 
		<td>
			{{ $user->nom }}
		</td>
		<td>
			{{ $user->email }}
		</td> 
		<td>
			{{ $user->ligue }}
		</td> 
		<td>
			@if ($user->valide)
				<img src="{{asset('img/valide.png')}}">
			@else
				<img src="{{asset('img/refuse.png')}}">
			@endif
		</td>
		<td> 
			<a href= {{ route('modify', $user->pseudo) }}>
				<button type="submit" class ="btn btn-primary" > Modifier</button>
			</a> 
			@unless ( $user->ligue == "aucune" || $user->valide)
			<a href= {{ route('valide', $user->id_user)}}>
				<button type ="submit" class ="btn btn-primary"> Valider</button>
			</a>
			@endif
		</td>
    </tr>
    
    @endforeach
</table>

@stop
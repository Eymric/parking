@extends ('layouts.app')

@section ('content')

<h1>Gestion des places</h1>
<br/> <br/>

<h3>Ajout de places: </h3>
@php
$places = App\Place::all();
@endphp
<form method=POST action="{{ route('update.gestion') }}">
	{{ csrf_field()}}
<input type="number" name="nbPlace">
<button type="submit" class ="btn btn-primary" placeholder="Nombre de places à ajouter"> Valider </button>
</form>



<table class= "table table-bordered">
	<tr>
		<th>Numéro</th> <th>Etat place</th>  <th>Historique</th>
		@foreach ($places as $place)
		<tr>
			<td>{{$place->numPlace}}</td> 
			{{-- <td> <a href="{{ route('delete.place',$nb = $place->numPlace )}}"> <button class="btn btn-primary">Supprimer</button></a></td>  --}}
			<td>	@if ($place->etat)
				<img src="{{asset('img/valide.png')}}">
			@else
				<img src="{{asset('img/refuse.png')}}">
			@endif
			</td>
			<td>
				@php
				$idPlace = $place->idPlace;
				@endphp
				<a href= {{ route('hist', $idPlace)}}><button class="btn btn-primary">Historique</button> </a>
			</td>
		</tr>
		@endforeach
	</tr>

</table>


@stop
@extends ('layouts.app')

@section ('content')

<h5> Profile utilisateur - Informations personnelles	</h5>

<p> Pseudo :{{ $user-> pseudo }}</p>
<p> Nom :{{ $user-> nom }}	</p>
<p> Prenom : {{$user -> prenom}} </p>
<p> Email :{{$user -> email}} </p>
<p> Ligue : {{$user -> ligue}} </p>

<a href= {{ route('modif', $user->pseudo) }}>
				<button type="submit" class ="btn btn-primary" > Modifier</button>
@endsection
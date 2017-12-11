@extends ('layouts.app')

@section ('content')

<h1> Nom :{{ $user-> nom }}	</h1>
<p> Prenom : {{$user -> prenom}} </p>
<p> Email :{{$user -> email}} </p>
<p> Ligue : {{$user -> ligue}} </p>

@endsection
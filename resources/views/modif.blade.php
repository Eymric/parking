@extends ('layouts.app')

@section('content')

@php
	$users = App\User::all();
@endphp

<h1>Modification du compte</h1>
 <form action="{{ route('updateUser', $user->id_user) }}" method="POST">
 	{{ csrf_field()}}
<table class="table table-bordered">
	<tr>
		<th>Pseudo</th>
		<td><input type="text" name="Pseudo" value="{{ $user->pseudo }}" required></td>
	</tr>
	<tr>
		<th>Prenom</th>
		<td><input type="text" name="Prenom" value="{{ $user->prenom }}" required></td>
	</tr>
	<tr>
		<th>Nom</th>
		<td><input type="text" name="Nom" value="{{ $user->nom }}" required></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="text" name="Email" value="{{ $user->email }}" required></td>
	</tr>

</table>
<input type="submit" class="btn btn-primary" name="submit" value="Modifier">

</form>
		

@stop
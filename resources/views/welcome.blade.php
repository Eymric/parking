@extends ('layouts.app')

    @section ('content')
    @php 
        use App\Place;
        use App\Reserver;
        use App\User;
    @endphp
        @guest
            <div class="title m-b-md">
                <h1> Parking M2L </h1>
            </div>
        @else 
            <div class="title m-b-md">
                <h1>Parking M2L</h1> 
            </div> <br/>
            <h4> {{  auth()->user()->nom }} {{ auth()->user()->prenom }} </h4>
           
        {{--     $idUser = auth()->user()->id_user;
                 Reserver::all()->whereidPlace()
                 $place = Place::whereidPlace(Reserver::)
                 (Reserver::idUser($idUser)->first()) --}}
                
            {{-- <h3>Vous avez la place de parking </h3> --}}
        
        @endguest
        @auth
            @if(auth()->user()->isValide())
            <a href="{{ route ('reserver') }}"><button type="button" class="btn btn-primary btn-lg">Reserver</button></a>
            @else 
              <p> Votre compte n'est pas valide. L'administrateur doit valider votre inscription.</p>
            @endif
        @endauth

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                
    @endsection
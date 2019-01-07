<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Periode;
use App\Reserve;
use Carbon\Carbon;
use DateTime;

class ReserverController extends Controller
{
        public function __construct()
    {
        $this->middleware('valide');

    }

   public function index()
    {
        return view('reserver');
    }


    public function validation()
    {
 
	    	$place = Place::all()->firstWhere('etat', true);
	    	$current = Carbon::now();
	    	$current = new Carbon();	
			$current->todatestring();
			$periodes = Periode::all();
			foreach($periodes as $periode){
				if ($current < $periode->debutPeriode){
					Periode::create(['debutPeriode' => $current]);
				}
			}
			Reserve::create(['finPeriode' => null, 'idUser' => auth()->user()->id_user, 'idPlace' => $place->idPlace, 'debutPeriode' => $current]);
			$place->update(['etat' => false]);
			echo ('reservation réalisé');
	}

	public function attente()
	{
    		$users = User::all();
    		$rangMax = $users->max('rang');
    		$user = auth()->user();
    		$user->rang = $rangMax + 1;
    		$user->save();
    		echo("vous êtes placé dans la file d'attente");			
	}

  // //   	$user = User::whereNom($nom)->first();
  //   	$places = Place::all();
  // //   	if ($places->isEmpty())
		// // {
		// // 	DB::table('reserver')->insert(['idUser' => $user->id_user, 'idPlace' => ]);
		// // }

  //   	$placeDispo = 0; $placeOqp= 0;
		// // boucle test places dispo
		// foreach ($places as $place){
		// if ($place->etat)
		// 	$placeOqp++;
		// else 
		// 	$placeDispo++;

		// }
		
		// if($placeDispo > 0){
		// 	$minPlace = $places->min('numPlace');
		// 	$now = new DateTime();
		// 	$a = DB::table('place')->inRandomOrder()->select('idPlace', 'numPlace')->where('etat', false)->first();
		// 	$idPlace = $a->idPlace;
		// 	$numPlace = $a->numPlace;
		// 	$id = auth()->user()->id_user;
		// 	DB::table('reserver')->insert(['finPeriode' => $now, 'idUser' => $id, 'idPlace' => $idPlace, 'debutPeriode' => $now] );
		// 	$place = Place::where('idPlace', $idPlace);
		// 	$place->update(['etat' => true]);
		// 	return redirect()->back()->withSucces('Votre réservation a été effectué avec succès, vous avez la place de parking numéro ', $numPlace);
		// }
		// else 
		// 	$FileNb = User::has('rang', '>', 0)->count();
		// 	// DB::table('membre')->insert('rang' => )																																																			

		// // dd(Place::whereEtat(false)->first());
		// // $user = auth()->user()->nom
}

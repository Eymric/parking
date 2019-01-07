<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Place;
use DB;

class PlacesController extends Controller
{
       public function __construct()
    {
        $this->middleware('admin');

    }

       public function index()
    {
        return view('admin.places');
    }

    public function ajout(Request $request)
    {
    	$places = Place::all();
    	if ($places->isEmpty()){
			for ($i = 1; $i <= $request->input('nbPlace'); $i++){
				DB::table('place')->insert(['numPlace' => $i, 'etat' => false]);
			}
		}
		else {
			$lastPlace = ($places->last()->numPlace);
			$lastPlace = $lastPlace +1;
			for ($i = 1; $i <= $request->input('nbPlace'); $i++)
				DB::table('place')->insert(['numPlace' => $lastPlace++, 'etat' => false]);
		}
		return view('admin.places');

	}


	// public function delete(Request $request, $nb)
	// {

	// 	Place::whereNumplace($nb)->first()->delete();
	// 	return view('admin.places');
	// }

	public function historique($idPlace)
	{
		return view('historique', $idPlace);
	}

	public function hist($id){
	return view('historique', $id);
}
}

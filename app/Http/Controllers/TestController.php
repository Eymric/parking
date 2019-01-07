<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('valide');

    }

    public function modif($pseudo)
    {
        $user = User::wherePseudo($pseudo)->first();
        return view('modif')->withUser($user);
    }

     public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['pseudo' => $request->Pseudo, 'prenom' => $request->Prenom, 'nom' => $request->Nom, 'email'=> $request->Email]);
        return view('profile')->withUser($user);
    }
}
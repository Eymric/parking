<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');

    }

   	public function index()
    {
        return view('admin.users');
    }


    public function show($pseudo)
    {
        $user = User::wherePseudo($pseudo)->first();
        return view('admin.modify')->withUser($user);
    }

     public function valider($id)
    {
        $user = User::whereid_user($id)->first();
        $user->valide = true;
        $user->save();
        return view('admin/users');
    }

     public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['pseudo' => $request->Pseudo, 'prenom' => $request->Prenom, 'nom' => $request->Nom, 'email'=> $request->Email]);
        return view('admin.users', $user);
    }
}
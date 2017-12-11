<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class profilecontroller extends Controller
{
       public function show($nom)
    {
        $user = User::whereNom($nom)->first();
        return view('profile')->withUser($user);
    }
}

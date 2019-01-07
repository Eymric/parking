<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Periode;
use DB;
use DateTime;

class test extends Controller
{
         public function index($i)
    {
        $user = User::whereid_user($i)->first();
        return view('admin.users')->withUser($user);
    }

    public function test()
    {
    	$FileNb = User::whereNull('rang')->count();
    	dd($FileNb);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListAttenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');

    }

    public function index()
    {
        return view('admin.listAttente');
    }


}

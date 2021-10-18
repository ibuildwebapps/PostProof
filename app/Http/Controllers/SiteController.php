<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $hits = \App\Models\Hit::paginate(20) ;

        return view('index', compact('hits')) ;
    }
}

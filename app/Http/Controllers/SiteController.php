<?php

namespace App\Http\Controllers;

use App\Models\Hit;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $hits = Hit::orderBy('created_at', 'DESC')->paginate(20) ;

        return view('index', compact('hits')) ;
    }

    public function show($id)
    {
        $hit = Hit::findOrFail($id) ;
        $postData = \App\Models\Metadata::where('fk_hit_id', $hit->id)->where('metadata_type', 'POST')->OrderBy('metadata_key')->get() ;
        $getData = \App\Models\Metadata::where('fk_hit_id', $hit->id)->where('metadata_type', 'GET')->OrderBy('metadata_key')->get() ;
        $headerData = \App\Models\Metadata::where('fk_hit_id', $hit->id)->where('metadata_type', 'HEADER')->OrderBy('metadata_key')->get() ;

        return view('show', compact('hit', 'postData', 'getData', 'headerData')) ;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function show(){
        $results = DB::table('bien')->get();
        return view('welcome',['properties' => $results]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicHealthController extends Controller
{
    //
    public function show(){
        return view('public_health_centres');
    }
}

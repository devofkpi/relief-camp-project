<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class HomePageController extends Controller
{
    //
    public function show(){
        return view('home');
    }
}

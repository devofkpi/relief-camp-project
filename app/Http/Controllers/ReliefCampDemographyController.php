<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReliefCampDemographyController extends Controller
{
    //
    public function show(String $name=null){
        return view('relief_camp_demography',['name'=>$name]);
    }
}

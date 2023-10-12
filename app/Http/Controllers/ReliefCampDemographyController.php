<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReliefCamp;

class ReliefCampDemographyController extends Controller
{
    //
    public function show(String $relief_camp_id=null){

        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $demography_data=$relief_camp->reliefCampDemography();
        dd($demography_data);
        return view('relief_camp_demography',['name'=>$name]);
    }
}

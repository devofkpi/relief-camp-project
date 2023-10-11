<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReliefCampDemography;
use App\Models\ReliefCamp;
class ReliefCampDemographyController extends Controller
{
    //
    public function show(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $relief_camp_name=$relief_camp->relief_camp_name;
        $demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('relief_camp_id','=',$relief_camp_id)->get();
        return view('relief_camp_demography',['demography_data'=>$demography_data,'relief_camp_name'=>$relief_camp_name]);
    }
}

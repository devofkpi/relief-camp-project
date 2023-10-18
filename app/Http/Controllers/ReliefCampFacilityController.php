<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReliefCampFacility;
use App\Models\ReliefCamp;
class ReliefCampFacilityController extends Controller
{
    //
    public function showById(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $relief_camp_name=$relief_camp->relief_camp_name;
        $facilities_data=ReliefCampFacility::where('relief_camp_id','=',$relief_camp_id)->get();;
        return view('relief_camp_facilities',['facilities_data'=>$facilities_data,'relief_camp_name'=>$relief_camp_name]);
    }

    public function showFacilitiesForm(){

        return view('create_relief_camp_facilities');
    }

    public function createFacilities(){
    }

    public function campFacilitiesImport(){
        
    }
}

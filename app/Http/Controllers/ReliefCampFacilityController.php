<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReliefCampFacility;
use App\Models\ReliefCamp;

use Maatwebsite\Excel\Facades\Excel;

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

        $relief_camps=ReliefCamp::select('id','name');

        return view('create_relief_camp_facilities',['relief_camps'=>$relief_camps]);
    }

    public function createFacilities(){
    }

    public function campFacilitiesImport(Request $request){

        Excel::import(new ReliefCampFacilityImport($request->input['relief_camp_id']), $request->file('relief_camp_facilities_excel'));

        return ReliefCampFacility::with('reliefCamp')->get();

    }
}

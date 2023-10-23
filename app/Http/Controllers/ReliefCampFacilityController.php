<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ReliefCampFacility,ReliefCamp};
use App\Imports\ReliefCampFacilitiesImport;

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

        $relief_camps=ReliefCamp::select('id','relief_camp_name','camp_code')->get();

        return view('create_relief_camp_facilities',['relief_camps'=>$relief_camps]);
    }

    public function createFacilities(Request $request){

        ReliefCampFacility::create([
            'building_type'=>$request['building_type'],
            'number_of_persons'=>$request['number_of_persons'],
            'number_of_rooms'=>$request['number_of_rooms'],
            'number_of_halls'=>$request['number_of_halls'],
            'number_of_toilets'=>$request['number_of_toilets'],
            'number_of_persons_utilising_toilets'=>$request['number_of_persons_utilising_toilets'],
            'number_of_persons_staying_at_night'=>$request['number_of_persons_staying_at_night'],
            'number_of_mattresses'=>$request['number_of_mattresses'],
            'number_of_badsheets'=>$request['number_of_badsheets'],
            'number_of_blankets'=>$request['number_of_blankets'],
            'number_of_mosquito'=>$request['number_of_mosquito'],
            'number_of_fans'=>$request['number_of_fans'],
            'availability_of_food_grains_in_days'=>$request['availability_of_food_grains_in_days'],
            'availability_of_veg_in_days'=>$request['availability_of_veg_in_days'],
            'safe_drinking_water'=>strcasecmp($request['safe_drinking_water'],'yes')==0?true:false,
            'provisioning_of_supplement'=>strcasecmp($request['provisioning_of_supplement'],'yes')==0?true:false,
            'relief_camp_id'=>$request['relief_camp_id']
        ]);

        return redirect()->back()->withSuccess('Relief Camp Facility created successfully');
    }

    public function campFacilitiesImport(Request $request){

        Excel::import(new ReliefCampFacilitiesImport, $request->file('relief_camp_facilities_excel'));

        $relief_camps_facilities= ReliefCampFacility::with('reliefCamp')->get();

        return redirect()->back();

    }
}

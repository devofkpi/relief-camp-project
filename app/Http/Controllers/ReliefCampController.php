<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDivision;
use App\Models\ReliefCamp;
use App\Models\NodalOfficer;

class ReliefCampController extends Controller
{
    //
    public function showAllCamps(){

        $relief_camp_data=ReliefCamp::get();
        return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }

    public function showBySubDivision($sub_division_id=null)
    {
        $sub_division=SubDivision::findOrFail($sub_division_id);
        $relief_camp_data=$sub_division->reliefCamps()->with('address')->with('nodalOfficer')->get();
        return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }

    public function showByNodalOfficer($nodal_officer_id=null)
    {
        $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
        $relief_camp_data=$nodal_officer->reliefCamps()->get();
        return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }

    public function showReliefCampForm(){
        $sub_divisions=SubDivision::get();
        return view('create_relief_camp',['sub_divisions_data'=>$sub_divisions]);
    }
    public function createReliefCamp(){

    }

    public function reliefCampImport(){

    }
}

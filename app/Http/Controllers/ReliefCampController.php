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
        return view('relief_camps');
    }

    public function showBySubDivision($sub_division_id=null)
    {
        $sub_division=SubDivision::findOrFail($sub_division_id);
        $relief_camps=$sub_division->reliefCamps()->get();
        return $relief_camps;
        //return view('relief_camps');
    }

    public function showByNodalOfficer($nodal_officer_id=null)
    {
        $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
        $relief_camps=$nodal_officer->reliefCamps()->get();
        return $relief_camps;
        //return view('relief_camps');
    }
}

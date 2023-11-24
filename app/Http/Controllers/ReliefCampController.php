<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDivision;
use App\Models\ReliefCamp;
use App\Models\NodalOfficer;

use App\Imports\ReliefCampImport;
use Maatwebsite\Excel\Facades\Excel;

class ReliefCampController extends Controller
{
    //
    public function showAllCamps(){

        $relief_camp_data=ReliefCamp::paginate(25);
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
        $nodal_officers=NodalOfficer::select('id','officer_name')->get();
        return view('create_relief_camp',['sub_divisions'=>$sub_divisions,'nodal_officers'=>$nodal_officers]);
    }
    public function createReliefCamp(Request $request){

        $address=Address::create([
            'address'=>$request['location'],
        ]);

        $relief_camp=ReliefCamp::create([

            'relief_camp_name'=>$request['relief_camp_name'],
            'camp_code'=>$request['camp_code'],
            'address_id'=>$address->id,
            'sub_division_id'=>$request['sub_division_id'],
            'nodal_officer_id'=>$request['nodal_officer_id']
        ]);

        return redirect()->back()->withSuccess('Relief Camp created successfully');
    }

    public function reliefCampImport(Request $request){
        Excel::import(new ReliefCampImport, $request->file('relief_camp_excel'));
        $relief_camp_data=ReliefCamp::get();
        return redirect()->route('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }
}

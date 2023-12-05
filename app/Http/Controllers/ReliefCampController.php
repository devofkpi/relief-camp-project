<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SubDivision,ReliefCamp,NodalOfficer,Address};

use App\Imports\ReliefCampImport;
use Maatwebsite\Excel\Facades\Excel;

class ReliefCampController extends Controller
{
    //
    public function showAllCamps(){

        $user=auth()->user();

        if($user->role==0){
            $relief_camp_data=ReliefCamp::where('active_status','=',true)->paginate(25);
            return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
        }else if($user->role==2){
            $relief_camp_data=ReliefCamp::where('active_status','=',true)->where('sub_division_id','=',$user->sub_division_id)->paginate(25);
            return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
        }else if($user->role==3){
            $relief_camp_data=ReliefCamp::where('active_status','=',true)->where('nodal_officer_id','=',$user->nodal_officer_id)->first();
            return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
        }
    }

    public function showBySubDivision($sub_division_id=null)
    {
        $sub_division=SubDivision::findOrFail($sub_division_id);
        $relief_camp_data=$sub_division->reliefCamps()->with('address')->with('nodalOfficer')->paginate(25);
        return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }

    public function showByNodalOfficer($nodal_officer_id=null)
    {
        $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
        $relief_camp_data=$nodal_officer->reliefCamps()->get();
        return view('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }

    public function showReliefCampForm($id=null){
        
        $sub_divisions=SubDivision::get();
        $nodal_officers=NodalOfficer::select('id','officer_name')->get();        
        
        if($id==null){
            return view('CRUD.create_relief_camp',['sub_divisions'=>$sub_divisions,'nodal_officers'=>$nodal_officers]);
        }else{
            $relief_camp=ReliefCamp::with('address','subDivision','nodalOfficer')->find($id);

            return view('CRUD.update_relief_camp',['sub_divisions'=>$sub_divisions,'nodal_officers'=>$nodal_officers,'relief_camp'=>$relief_camp]);
        }
    }
    public function createOrUpdateReliefCamp(Request $request){

        $relief_camp=ReliefCamp::with('address')->find($request->input('relief_camp_id'));
        if($relief_camp==null){
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
        }else{
            $relief_camp->relief_camp_name=$request['relief_camp_name'];
            $relief_camp->camp_code=$request['camp_code'];
            $relief_camp->address->address=$request['address'];
            $relief_camp->sub_division_id=$request['sub_division_id'];
            $relief_camp->nodal_officer_id=$request['nodal_officer_id'];
            $relief_camp->save();
        }

        return redirect()->back()->withSuccess('Relief Camp created successfully');
    }

    public function deleteReliefCamp($relief_camp_id=null){
        if($relief_camp_id!=null){
            $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
            $relief_camp->active_status=false;
            $relief_camp->save();
            return redirect()->back()->with('success','Relief Camp Deleted Successfully');
        }
    }

    public function showCampById($id=null){
        $relief_camp=ReliefCamp::with('address','subDivision','nodalOfficer')->find($id);
        return view('CRUD.view_relief_camp',['relief_camp'=>$relief_camp]);
    }

    public function reliefCampImport(Request $request){
        Excel::import(new ReliefCampImport, $request->file('relief_camp_excel'));
        $relief_camp_data=ReliefCamp::get();
        return redirect()->route('relief_camps',['relief_camp_data'=>$relief_camp_data]);
    }
}

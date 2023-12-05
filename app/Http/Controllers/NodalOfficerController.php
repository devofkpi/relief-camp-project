<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,RedirectResponse};
use App\Imports\NodalOfficerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{NodalOfficer,ReliefCamp};

class NodalOfficerController extends Controller
{
    //
    private $nodal_officers;

    public function showAll(){
        $user=auth()->user();
        if($user->role==0 || $user->role==1){
            $this->nodal_officers=NodalOfficer::with('reliefCamps')->paginate(25);
            return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);    
        }else if($user->role==2){
            $sub_division_id=$user->sub_division_id;
            $this->nodal_officers=NodalOfficer::with('reliefCamps')->whereHas('reliefCamps',
            function($q) use($sub_division_id){
                $q->where('sub_division_id','=',$sub_division_id);
            })->paginate(25);
            return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);
        }
    }

    public function showById($id=null){
        $this->nodal_officer=NodalOfficer::with('reliefCamps')->find($id);
        return view('CRUD.view_nodal_officer',['nodal_officer'=>$this->nodal_officer]);
    }
    
    public function showNodalOfficerForm($id=null){
        if($id==null){
            $relief_camps=ReliefCamp::select('id','relief_camp_name')->get();
            return view('CRUD.create_nodal_officers',['relief_camps'=>$relief_camps]);
        }else{
            $relief_camps=ReliefCamp::select('id','relief_camp_name')->get();
            $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
            return view('auth.update_nodal_officer',['nodal_officer'=>$nodal_officer,'relief_camps'=>$relief_camps]);
        }
    }

    public function createOrUpdateNodalOfficer(Request $request){
        $nodal_officer=NodalOfficer::find($request->input('nodal_officer_id'));
        if($nodal_officer==null){
            $nodal_officer=NodalOfficer::create([
                'officer_name'=>$request['officer_name'],
                'officer_designation'=>$request['officer_designation'],
                'officer_contact'=>$request['officer_contact']
            ]);
            return redirect()->back()->withSuccess('Nodal Officer Created Successfully');    
        }else{
            $nodal_officer->officer_name=$request['officer_name'];
            $nodal_officer->officer_designation=$request['officer_designation'];
            $nodal_officer->officer_contact=$request['officer_contact'];
            $nodal_officer->save();
            return redirect()->back()->with('success','Nodal Officer Updated Successfully');
        }
        
    }


    public function nodalOfficerImport(Request $request){
        Excel::import(new NodalOfficerImport, $request->file('nodal_officer_excel'));
        $this->nodal_officers=NodalOfficer::get();
        return redirect()->route('show_all_nodal_officer',['nodal_officers_data'=>$this->nodal_officers]);
    }
}

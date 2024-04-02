<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,RedirectResponse};
use App\Imports\NodalOfficerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\{NodalOfficer,ReliefCamp};
use Illuminate\Support\Facades\Crypt;
use App\Library\Senitizer;

class NodalOfficerController extends Controller
{
    //
    private $nodal_officers;

    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }

    public function showAll(){
        $user=auth()->user();
        if($user->role==0 || $user->role==1){
            $this->nodal_officers=NodalOfficer::with('reliefCamps')->whereHas('reliefCamps',
            function($q){
                $q->where('active_status','=',true);
            })->where('active_status','=',true)->paginate(25);
            return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);    
        }else if($user->role==2){
            $sub_division_id=$user->sub_division_id;
            $this->nodal_officers=NodalOfficer::with('reliefCamps')->whereHas('reliefCamps',
            function($q) use($sub_division_id){
                $q->where('sub_division_id','=',$sub_division_id)->where('active_status','=',true);
            })->where('active_status','=',true)->paginate(25);
            return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);
        }
    }

    public function showById($nodal_officer_id=null){
        if($nodal_officer_id!=null){
            $nodal_officer_id=Crypt::decrypt($nodal_officer_id);
            $this->nodal_officer=NodalOfficer::with('reliefCamps')->whereHas('reliefCamps',
            function($q){
                $q->where('active_status','=',true);
            })->findOrFail($nodal_officer_id);
            return view('CRUD.view_nodal_officer',['nodal_officer'=>$this->nodal_officer]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }
    
    public function showNodalOfficerForm($nodal_officer_id=null){
        if($nodal_officer_id==null){
            $relief_camps=ReliefCamp::select('id','relief_camp_name')->where('active_status','=',true)->get();
            return view('CRUD.create_nodal_officers',['relief_camps'=>$relief_camps]);
        }else{
            $nodal_officer_id=Crypt::decrypt($nodal_officer_id);
            $relief_camps=ReliefCamp::select('id','relief_camp_name')->where('active_status','=',true)->get();
            $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
            return view('CRUD.update_nodal_officer',['nodal_officer'=>$nodal_officer,'relief_camps'=>$relief_camps]);
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
            return redirect()->back()->withSuccess('Nodal Officer Updated Successfully');
        }
        
    }

    public function deleteNodalOfficer($nodal_officer_id){
        $nodal_officer_id=Crypt::decrypt($nodal_officer_id);
        $nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
        $nodal_officer->active_status=false;
        $nodal_officer->save();
        return redirect()->back()->with('success','Nodal Officer Deleted');
    }

    public function nodalOfficerImport(Request $request){
        $file_extnsn=$request->file('nodal_officer_excel')->extension();
        if($file_extnsn=='xlsx')
        {
        try{

            Excel::import(new NodalOfficerImport, $request->file('nodal_officer_excel'));
            $this->nodal_officers=NodalOfficer::get();
            return redirect()->route('show_all_nodal_officer',['nodal_officers_data'=>$this->nodal_officers]);
        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
    }else{
        return redirect()->back()->withError('Invalid File Format'); 
    }
    }
}

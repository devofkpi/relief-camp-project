<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request,RedirectResponse};
use App\Imports\NodalOfficerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\NodalOfficer;

class NodalOfficerController extends Controller
{
    //
    private $nodal_officers;

    public function showAll(){
        $this->nodal_officers=NodalOfficer::with('reliefCamps')->paginate(25);
        return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);    
    }
    public function showNodalOfficerForm(){
        return view('create_nodal_officers');
    }

    public function createNodalOfficer(Request $request){
        
        $nodal_officer=NodalOfficer::create([
            'officer_name'=>$request['officer_name'],
            'officer_designation'=>$request['officer_designation'],
            'officer_contact'=>$request['officer_contact']
        ]);

        return redirect()->back()->withSuccess('Nodal Officer Created Successfully');
    }

    public function nodalOfficerImport(Request $request){
        Excel::import(new NodalOfficerImport, $request->file('nodal_officer_excel'));
        $this->nodal_officers=NodalOfficer::get();
        return redirect()->route('show_all_nodal_officer',['nodal_officers_data'=>$this->nodal_officers]);
    }
}

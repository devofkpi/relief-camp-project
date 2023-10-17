<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\NodalOfficerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\NodalOfficer;

class NodalOfficerController extends Controller
{
    //
    private $nodal_officers;

    public function showAll(){
        $this->nodal_officers=NodalOfficer::get();
        return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);    
    }
    public function showNodalOfficerForm(){
        return view('create_nodal_officers');
    }

    public function createNodalOfficer(){
        
    }

    public function nodalOfficerImport(Request $request){
        Excel::import(new NodalOfficerImport, $request->file('nodal_officer_excel'));
        $this->nodal_officers=NodalOfficer::get();
        return view('nodal_officers',['nodal_officers_data'=>$this->nodal_officers]);
    }
}

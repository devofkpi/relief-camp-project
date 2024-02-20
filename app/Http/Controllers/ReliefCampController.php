<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SubDivision,ReliefCamp,NodalOfficer,Address};
use Illuminate\Support\Facades\Crypt;
use App\Imports\ReliefCampImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Library\Senitizer;

class ReliefCampController extends Controller
{
    //

    protected $user=null;
    protected $relief_camp=null;
    protected $relief_camp_id=null;
    protected $sub_division=null;
    protected $sub_division_id=null;
    protected $nodal_officer=null;
    protected $nodal_officer_id=null;

    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }
    
    /**
     * 
     * showAllCamps() function return all the relief camps based on user role
     * role=0 for super user
     * role=1 for admin user
     * role=2 for moderate user
     * role=3 for normal user   
     */
    
    public function showAllCamps(){

        $this->user=auth()->user();

        if($this->user->role==0){
            $this->relief_camp=ReliefCamp::where('active_status','=',true)->paginate(25);
            return view('relief_camps',['relief_camp_data'=>$this->relief_camp]);
        }else if($this->user->role==2){
            $this->relief_camp=ReliefCamp::where('active_status','=',true)->where('sub_division_id','=',$this->user->sub_division_id)->paginate(25);
            return view('relief_camps',['relief_camp_data'=>$this->relief_camp]);
        }else if($this->user->role==3){
            $this->relief_camp=ReliefCamp::where('active_status','=',true)->where('nodal_officer_id','=',$this->user->nodal_officer_id)->first();
            return view('relief_camps',['relief_camp_data'=>$this->relief_camp]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }

    /**
     * showBySubDivision() function accept sub division id as parameter 
     * and return relief camp based on sub division
     */

    public function showBySubDivision($sub_division_id=null)
    {
        $sub_division_id=Crypt::decrypt($sub_division_id);
        $this->sub_division=SubDivision::findOrFail($sub_division_id);
        $this->relief_camp=$this->sub_division->reliefCamps()->where('active_status','=',true)->with('address')->with('nodalOfficer')->paginate(25);
        return view('relief_camps',['relief_camp_data'=>$this->relief_camp]);
    }

    /**
     * showByNodalOfficer() accept nodal officer id as parameter
     * and return relief camps based on nodal officer
     * 
     */

    public function showByNodalOfficer($nodal_officer_id=null)
    {
        $nodal_officer_id=Crypt::decrypt($nodal_officer_id);
        $this->nodal_officer=NodalOfficer::findOrFail($nodal_officer_id);
        $this->relief_camp=$this->nodal_officer->reliefCamps()->where('active_status','=',true)->get();
        return view('relief_camps',['relief_camp_data'=>$this->relief_camp]);
    }

    /**
     * showReliefCampForm() accept id as parameter and return form for creating new relief camp 
     * or form for updating relief camp data
     * return sub division and nodal officer for assigning to relief camp
     * 
     */
    public function showReliefCampForm($relief_camp_id=null){

        $this->sub_division=SubDivision::get();
        $this->nodal_officer=NodalOfficer::select('id','officer_name')->get();        
        
        if($relief_camp_id==null){
            return view('CRUD.create_relief_camp',['sub_divisions'=>$this->sub_division,'nodal_officers'=>$this->nodal_officer]);
        }else if($relief_camp_id!=null){
            $relief_camp_id=Crypt::decrypt($relief_camp_id);      
            $this->relief_camp=ReliefCamp::with('address','subDivision','nodalOfficer')->find($relief_camp_id);

            return view('CRUD.update_relief_camp',['sub_divisions'=>$this->sub_division,'nodal_officers'=>$this->nodal_officer,'relief_camp'=>$this->relief_camp]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }

    /**
     * 
     * createOrUpdateReliefCamp() accept request parameter throuh form
     * and create relief camp or update it
     * 
     */
    public function createOrUpdateReliefCamp(Request $request){

        $this->relief_camp=ReliefCamp::with('address')->find($request->input('relief_camp_id'));
        if($this->relief_camp==null){
            $address=Address::create([
                'address'=>$request['location'],
            ]);
            
            $this->sub_division_id=SubDivision::select('id')->where('sub_division_code','=',$request['sub_division_code'])->first();

            $this->relief_camp=ReliefCamp::create([
    
                'relief_camp_name'=>$request['relief_camp_name'],
                'camp_code'=>$request['sub_division_code'].'-'.$request['camp_code'],
                'address_id'=>$address->id,
                'sub_division_id'=> $this->sub_division_id->id,
                'nodal_officer_id'=>$request['nodal_officer_id']
            ]);
            return redirect()->back()->withSuccess('Relief Camp created successfully');
        }elseif($this->relief_camp!=null){
            $this->relief_camp->relief_camp_name=$request['relief_camp_name'];
            $this->relief_camp->camp_code=$request['camp_code'];
            $this->relief_camp->address->address=$request['address'];
            $this->relief_camp->sub_division_id=$request['sub_division_id'];
            $this->relief_camp->nodal_officer_id=$request['nodal_officer_id'];
            $this->relief_camp->save();
            return redirect()->back()->withSuccess('Relief Camp updated successfully');
        }else{
            return  abort(403, 'Unauthorized action.');
        }

    }

    /**
     * 
     * deleteReliefCamp() accept relief camp id and delete relief camp based on it
     * 
     */

    public function deleteReliefCamp($relief_camp_id=null){
        if($relief_camp_id!=null){
            $relief_camp_id=Crypt::decrypt($relief_camp_id);
            $this->relief_camp=ReliefCamp::findOrFail($relief_camp_id);
            $this->relief_camp->active_status=false;
            $this->relief_camp->save();
            return redirect()->back()->withSuccess('Relief Camp Deleted Successfully');
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }

    /**
     * 
     * showCampById() function accept camp id as parameter and return relief camp based on id
     * 
     */

    public function showCampById($relief_camp_id=null){
        if($relief_camp_id!=null){
            $relief_camp_id=Crypt::decrypt($relief_camp_id);
            $this->relief_camp=ReliefCamp::with('address','subDivision','nodalOfficer')->findOrFail($relief_camp_id);
            return view('CRUD.view_relief_camp',['relief_camp'=>$this->relief_camp]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }

    /**
     * 
     * reliefCampImport() accept excel sheet through request parameter 
     * and create all the relief camp in one go 
     * 
     */

    public function reliefCampImport(Request $request){

        try{

        Excel::import(new ReliefCampImport, $request->file('relief_camp_excel'));
        $this->relief_camp=ReliefCamp::get();
        return redirect()->route('relief_camps',['relief_camp_data'=>$this->relief_camp]);

        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
        }
    }
}

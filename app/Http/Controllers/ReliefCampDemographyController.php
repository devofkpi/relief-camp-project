<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ReliefCampDemography,ReliefCamp};
use App\Imports\ReliefCampDemographyImport;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;

class ReliefCampDemographyController extends Controller
{
    protected $demography_data;
    protected $category_name;
    protected $import_failures;
    protected $user;
    
    //
    public function showAllInmates(){
        $user=auth()->user();
        if($user->role==0 || $user->role==1){
            $this->demography_data=ReliefCampDemography::where('active_status','=',true)->paginate(25);
        }else if($user->role==2){
            $sub_division_id=$user->sub_division_id;
            $this->demography_data=ReliefCampDemography::with('reliefCamp')->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where('active_status','=',true)->paginate(25);
        }else if($user->role==3){
            $relief_camp_id=ReliefCamp::select('id')->where('nodal_officer_id','=',$user->nodal_officer_id)->where('active_status','=',true)->first();
            $this->demography_data=ReliefCampDemography::where('relief_camp_id','=',$relief_camp_id->id)->where('active_status','=',true)->paginate(25);
        }
        return view('relief_camp_demography',['demography_data'=>$this->demography_data]);
    }

    public function showInmateById($inamte_id=null){
        $inmate=ReliefCampDemography::with('address')->with('familyHead')->with('familyHeadRelation')->find($inamte_id);
        return view('CRUD.view_inmate',['inmate'=>$inmate]);
    }

    public function showByCamp(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $this->category_name=$relief_camp->relief_camp_name;
        $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('relief_camp_id','=',$relief_camp_id)->where('active_status','=',true)->paginate(25);
        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }

    public function showByCategory(String $category=null){

        $this->category_name=isset($category)?$category:null;
        $this->user=auth()->user();

        if($this->user->role==0 || $this->user->role==1){

            if($category=='male' || $category=='female' || $category=='third_gender'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['gender','=',$category],
                    ['active_status','=',1]]
                    )->paginate(25);
            }elseif($category=='old_age'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])->whereBetween('age',[50,100])->where('active_status','=',1)->paginate(25);
            }elseif($category=='child'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])->whereBetween('age',[0,8])->where('active_status','=',1)->paginate(25);
            }elseif($category=='orphan'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['orphan','=',true],
                    ['active_status','=',1]
                ])->paginate(25);
            }elseif($category=='lactating'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['lactating','=',true],
                    ['active_status','=',1]
                    ])->paginate(25); 
            }
        }else if($this->user->role==2){
            $sub_division_id=$this->user->sub_division_id;
            if($category=='male' || $category=='female' || $category=='third_gender'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address','reliefCamp'])->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where([['active_status','=',1],['gender','=',$category]])->paginate(25);
            }elseif($category=='old_age'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address','reliefCamp'])->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where('active_status','=',1)->whereBetween('age',[50,100])->paginate(25);
            }elseif($category=='child'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address','reliefCamp'])->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where('active_status','=',1)->whereBetween('age',[0,8])->paginate(25);
            }elseif($category=='orphan'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address','reliefCamp'])->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where([['active_status','=',1],['orphan','=',true]])->paginate(25);
            }elseif($category=='lactating'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address','reliefCamp'])->whereHas('reliefCamp',
                function($q) use($sub_division_id){
                    $q->where('sub_division_id','=',$sub_division_id);
                })->where([['active_status','=',1],['lactating','=',true]])->paginate(25); 
            }
        }else if($this->user->role==3){
            $relief_camp_id=ReliefCamp::select('id')->where('nodal_officer_id','=',$this->user->nodal_officer_id)->first();
            if($category=='male' || $category=='female' || $category=='third_gender'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['gender','=',$category],
                    ['active_status','=',1],
                    ['relief_camp_id','=',$relief_camp_id->id]
                    ])->paginate(25);
            }elseif($category=='old_age'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['relief_camp_id','=',$relief_camp_id->id],
                    ['active_status','=',1]
                    ])->whereBetween('age',[50,100])->paginate(25);
            }elseif($category=='child'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['relief_camp_id','=',$relief_camp_id->id],
                    ['active_status','=',1]
                    ])->whereBetween('age',[0,8])->paginate(25);
            }elseif($category=='orphan'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['relief_camp_id','=',$relief_camp_id->id],
                    ['active_status','=',1],
                    ['orphan','=',true]
                    ])->paginate(25);
            }elseif($category=='lactating'){
                $this->demography_data=ReliefCampDemography::with(['familyHead','familyHeadRelation','address'])
                ->where([
                    ['relief_camp_id','=',$relief_camp_id->id],
                    ['active_status','=',1],
                    ['lactating','=',true]
                    ])->paginate(25); 
            }
        }

        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }

    public function showInmatesForm($inamte_id=null){
        if($inamte_id==null){
            $relief_camps=ReliefCamp::select('id','relief_camp_name','camp_code')->get();
            return view('CRUD.create_inmates',['relief_camps'=>$relief_camps]);
        }else{
            $relief_camps=ReliefCamp::select('id','relief_camp_name','camp_code')->get();
            $inmate=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->with('reliefCamp')->find($inamte_id);
            return view('CRUD.update_inmate',['inmate'=>$inmate,'relief_camps'=>$relief_camps]);
        }
    }

    public function createOrUpdateInmate(Request $request){

        $inmate=ReliefCampDemography::with(['address','family_head_name','family_head_relation'])->find($request->input('inmate_id'));

        if($inmate==null){

            $family_head=FamilyHead::create(['family_head_name'=>$request['family_head_name']]);
            
            $family_head_relation=FamilyHeadRelation::where('family_head_relation','=',$request['relation'])->first();
    
            $address=Address::create(['address'=>$request['address']]);
    
            $inmates=ReliefCampDemography::create([
                'person_name'=>$request['person_name'],
                'family_head_id'=>$family_head->id,
                'family_head_relation_id'=>$family_head_relation->id,
                'gender'=>$request['gender'],
                'age'=>$request['age'],
                'contact_number'=>$request['contact_number'],
                'physically_disabled'=>$request['physically_disabled'],
                'orphan'=>$request['orphan'],
                'lactating'=>$request['lactating'],
                'profession'=>$request['profession'],
                'any_special_condition'=>$request['any_special_condition'],
                'willing_to_goback'=>$request['willing_to_goback'],
                'remark'=>$request['remark'],
                'address_id'=>$address->id,
                'relief_camp_id'=>$request['relief_camp_id']
            ]);
    
            return redirect()->back()->withSuccess('Inmates created successfully');
        }else{

            $inmate->familyHead()->family_head_name=$request['family_head_name'];
            $inmate->familyHeadRelation()->family_head_realtion=$request['family_head_realation'];
            $inmate->address()->address=$request['address'];
            $inmate->person_name=$request['person_name'];
            $inmate->gender=$request['gender'];
            $inmate->age=$request['age'];
            $inmate->contact_number=$request['contact_number'];
            $inmate->physically_disabled=$request['physically_disabled'];
            $inmate->orphan=$request['orphan'];
            $inmate->lactating=$request['lactating'];
            $inmate->profession=$request['profession'];
            $inmate->willing_to_goback=$request['willing_to_goback'];
            $inmate->remark=$request['remark'];
            $inmate->relief_camp_id=$request['relief_camp_id'];
            $inmate->save();
            
            return redirect()->back()->withSuccess('update_msg','Inmate details updated successfully'); 

        }


    }

    public function deleteInmate($inmate_id){
        $inmate=ReliefCampDemography::findOrFail($inmate_id);
        $inmate->active_status=false;
        $inmate->save();
        return redirect()->back()->with('success','Inmate Deleted Successfully');
    }

    public function inmatesImport(Request $request){

        Excel::import(new ReliefCampDemographyImport($request->get('relief_camp_id')), $request->file('inmates_excel'));
        return redirect()->back();
    }
}

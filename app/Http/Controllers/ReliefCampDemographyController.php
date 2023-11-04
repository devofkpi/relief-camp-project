<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ReliefCampDemography,ReliefCamp};
use App\Imports\ReliefCampDemographyImport;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;

class ReliefCampDemographyController extends Controller
{
    public $demography_data;
    public $category_name;
    //
    public function showAllInmates(){
        $this->demography_data=ReliefCampDemography::paginate(25);
        return view('relief_camp_demography',['demography_data'=>$this->demography_data]);
    }
    public function showByCamp(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $this->category_name=$relief_camp->relief_camp_name;
        $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('relief_camp_id','=',$relief_camp_id)->paginate(25);
        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }

    public function showByCategory(String $category=null){

        $this->category_name=isset($category)?$category:null;

        if($category=='male' || $category=='female' || $category=='third_gender'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('gender','=',$category)->paginate(25);
        }elseif($category=='old_age'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->whereBetween('age',[50,100])->paginate(25);
        }elseif($category=='child'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->whereBetween('age',[0,8])->paginate(25);
        }elseif($category=='orphan'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('orphan','=',true)->paginate(25);
        }elseif($category=='lactating'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('lactating','=',true)->paginate(25); 
        }
        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }

    public function showInmatesForm(){

        $relief_camps=ReliefCamp::select('id','relief_camp_name')->get();
        return view('CRUD.create_inmates',['relief_camps'=>$relief_camps]);
    }

    public function createInmates(Request $request){

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
            'willing_to_goback'=>$request['willing_to_goback'],
            'remark'=>$request['remark'],
            'address_id'=>$address->id,
            'relief_camp_id'=>$request['relief_camp_id']
        ]);

        return redirect()->back()->withSuccess('Inmates created successfully');

    }

    public function inmatesImport(Request $request){

        Excel::import(new ReliefCampDemographyImport($request->get('relief_camp_id')), $request->file('inmates_excel'));
        return redirect()->back();
    }
}

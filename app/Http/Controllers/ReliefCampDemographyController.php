<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReliefCampDemography;
use App\Models\ReliefCamp;

class ReliefCampDemographyController extends Controller
{
    public $demography_data;
    public $category_name;
    //
    public function showByCamp(String $relief_camp_id=null){
        $relief_camp=ReliefCamp::findOrFail($relief_camp_id);
        $this->category_name=$relief_camp->relief_camp_name;
        $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('relief_camp_id','=',$relief_camp_id)->get();
        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }

    public function showByCategory(String $category=null){

        $this->category_name=isset($category)?$category:null;

        if($category=='male' || $category=='female' || $category=='third_gender'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('gender','=',$category)->get();
        }elseif($category=='old_age'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->whereBetween('age',[50,100])->get();
        }elseif($category=='child'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->whereBetween('age',[0,8])->get();
        }elseif($category=='orphan'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('orphan','=',true)->get();
        }elseif($category=='lactating'){
            $this->demography_data=ReliefCampDemography::with('familyHead')->with('familyHeadRelation')->with('address')->where('lactating','=',true)->get(); 
        }
        return view('relief_camp_demography',['demography_data'=>$this->demography_data,'category_name'=>$this->category_name]);
    }
}

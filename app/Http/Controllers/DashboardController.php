<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\{ReliefCampDemography, ReliefCamp,SubDivision};
use App\Library\Senitizer;

class DashboardController extends Controller
{
    //
    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }
    
    public function show(){
        $user=auth()->user();
        $pie_chart_data=array();
        $active_status_value=1;
        
        if($user->role==0 || $user->role==1){
            $relief_camp_data=SubDivision::with('reliefCamps')->whereHas('reliefCamps',
            function($q) use($active_status_value){
                $q->where('active_status','=',$active_status_value);
            })->get();
            foreach($relief_camp_data as $relief_camp){
                $pie_chart_data[$relief_camp->sub_division_name]=$relief_camp->reliefCamps()->count();
            }
            $relief_camp_count=ReliefCamp::where('active_status','=',1)->count();
            $inmates=ReliefCampDemography::where('active_status','=',1)->get();
            $inmates_count=$inmates->count();
            $male_count=$inmates->where('gender','=','male')->count();
            $female_count=$inmates->where('gender','=','female')->count();
            return view('dashboard',['inmates_count'=>$inmates_count, 'male_count'=>$male_count,'female_count'=>$female_count,'relief_camp_count'=>$relief_camp_count,'pie_chart_data'=>$pie_chart_data]);
        }else if($user->role==2){
            $sub_division_id=$user->sub_division_id;
            $relief_camp_count=ReliefCamp::where('active_status','=',1)->where('sub_division_id','=',$user->sub_division_id)->count();
            $inmates=ReliefCampDemography::with('reliefCamp')->whereHas('reliefCamp',
            function($q) use($sub_division_id){
                $q->where('sub_division_id','=',$sub_division_id);
            })->where('active_status','=',1)->get();
            $inmates_count=$inmates->count();
            $male_count=$inmates->where('gender','=','male')->count();
            $female_count=$inmates->where('gender','=','female')->count();
            return view('dashboard',['inmates_count'=>$inmates_count, 'male_count'=>$male_count,'female_count'=>$female_count,'relief_camp_count'=>$relief_camp_count]);
        }else if($user->role==3){
            $relief_camp_data=ReliefCamp::where('nodal_officer_id','=',$user->nodal_officer_id)->first();
            $inmates=ReliefCampDemography::where('relief_camp_id','=',$relief_camp_data->id)->where('active_status','=',1)->get();
            $inmates_count=$inmates->count();
            $male_count=$inmates->where('gender','=','male')->count();
            $female_count=$inmates->where('gender','=','female')->count();
            return view('dashboard',['inmates_count'=>$inmates_count, 'male_count'=>$male_count,'female_count'=>$female_count]);
        }

    }
}

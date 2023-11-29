<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\{ReliefCampDemography, ReliefCamp};

class DashboardController extends Controller
{
    //
    
    public function show(){
        $pie_chart_data=ReliefCamp::with('subDivision')->where('active_status','=',1)->groupBy('sub_division_id')->get();
        $relief_camp_count=ReliefCamp::where('active_status','=',1)->count();
        $inmates_count=ReliefCampDemography::where('active_status','=',1)->count();
        $male_count=ReliefCampDemography::where('gender','=','male')->where('active_status','=',1)->count();
        $female_count=ReliefCampDemography::where('gender','=','female')->where('active_status','=',1)->count();
        return view('dashboard',['inmates_count'=>$inmates_count, 'male_count'=>$male_count,'female_count'=>$female_count,'relief_camp_count'=>$relief_camp_count,'pie_chart_data'=>$pie_chart_data]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ReliefCampDemography;

class DashboardController extends Controller
{
    //
    
    public function show(){
        $inmates_count=ReliefCampDemography::where('active_status','=',1)->count();
        $male_count=ReliefCampDemography::where('gender','=','male')->where('active_status','=',1)->count();
        $female_count=ReliefCampDemography::where('gender','=','female')->where('active_status','=',1)->count();
        return view('dashboard',['inmates_count'=>$inmates_count, 'male_count'=>$male_count,'female_count'=>$female_count]);
    }
}

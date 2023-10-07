<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SubDivision;
use App\Models\NodalOfficer;
use App\Models\ReliefCamp;
use App\Models\ReliefCampDemography;

class HomePageController extends Controller
{
    //
    public function show(){
        $nav_sub_data=SubDivision::get();
        $nav_nodal_data=NodalOfficer::get();
        $total_nodal_officer=$nav_nodal_data->count();
        $total_camps=ReliefCamp::get()->count();
        $total_inmates=ReliefCampDemography::get()->count();
        return view('home',[
            'nav_sub_data'=>$nav_sub_data,
            'nav_nodal_data'=>$nav_nodal_data,
            'total_inmates'=>$total_inmates,
            'total_camps'=>$total_camps,
            'total_nodal_officer'=>$total_nodal_officer
        ]);
    }
}

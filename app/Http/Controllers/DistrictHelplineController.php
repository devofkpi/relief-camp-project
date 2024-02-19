<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Senitizer;

class DistrictHelplineController extends Controller
{
    //
    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }
    
    public function show(){
        return view('district_helplines');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Senitizer;

class AnnouncementController extends Controller
{
    //
    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }
    
    public function show(){
        return view('announcements');
    }
}

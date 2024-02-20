<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Response,Crypt};
use App\Library\Senitizer;

class DownloadController extends Controller
{
    //

    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }

    public function downloadExcelSample($filename=''){
        $filename=Crypt::decrypt($filename);
        $file_path= storage_path()."/app/public/downloads/".$filename;
        $headers=array(
            'Content-Type: application/excel',
            'Content-Disposition:attachment; filename='.$filename,
        );
        if(file_exists($file_path)){
            return Response::download($file_path,$filename,$headers);
        }else{
            exit('Requested file does not exist on our server!');
        }
    }
}

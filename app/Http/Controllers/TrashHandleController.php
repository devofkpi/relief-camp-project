<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ReliefCamp,NodalOfficer,ReliefCampDemography,User};
use Illuminate\Support\Facades\Crypt;
use App\Library\Senitizer;

class TrashHandleController extends Controller
{
    protected $relief_camps=null;
    protected $nodal_officers=null;
    protected $inmates=null;
    protected $users=null;
    //

    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }

    public function deletedItems(){
        $this->relief_camps=ReliefCamp::where('active_status','=',false)->paginate(25);
        $this->nodal_officers=NodalOfficer::where('active_status','=',false)->paginate(25);
        $this->inmates=ReliefCampDemography::where('active_status','=',false)->paginate(25);
        $this->users=User::where('active','=',false)->paginate(25);
        return view('trash',
        [
        'relief_camps'=>$this->relief_camps,
        'nodal_officers'=>$this->nodal_officers,
        'inmates'=>$this->inmates,
        'users'=>$this->users
    ]);
    }

    public function restoreItem($table_name,$id){
        $id=Crypt::decrypt($id);
        $table_name=Crypt::decrypt($table_name);
        if($table_name=='relief_camp'){
            $relief_camp=ReliefCamp::where([['id','=',$id],['active_status','=',false]])->first();
            $relief_camp->active_status=true;
            $relief_camp->save();
            return redirect()->back()->with('success','Relief Camp Restored');
        }else if($table_name=='nodal_officer'){
            $nodal_officer=NodalOfficer::where([['id','=',$id],['active_status','=',false]])->first();
            $nodal_officer->active_status=true;
            $nodal_officer->save();
            return redirect()->back()->with('success','Nodal Officer Restored');
        }else if($table_name=='relief_camp_demography'){
            $inmate=ReliefCampDemography::where([['id','=',$id],['active_status','=',false]])->first();
            $inmate->active_status=true;
            $inmate->save();
            return redirect()->back()->with('success','Inmate Restored');
        }else if($table_name=='user'){
            $user=User::findOrFail($id);
            $user->active=true;
            $user->save();
            return redirect()->back()->with('success','User Restored');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash};
use Session;
use App\Models\{SubDivision,NodalOfficer,ReliefCamp};

use App\Models\User;

use App\Library\Senitizer;

class UserController extends Controller
{

    private $user_role=[
        'super_user'=>0,
        'admin_user'=>1,
        'moderate_user'=>2,
        'normal_user'=>3
    ];
    //

    public function __construct(Request $request)
    {
       if( isset($_REQUEST) ){
            $_REQUEST = Senitizer::senitize($_REQUEST, $request);
       }
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function authUser(Request $request){
        
        $credentials=$request->validate([
            'email'=>'required | email',
            'password'=>'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->default_pwd_change)
                return redirect()->intended('dashboard');
            else
                return view('auth.change_default_pwd');
        }

         
        return back()->withErrors([
            'wrong_credentials' => 'Either email id or password is incorrect.',
        ])->onlyInput('email');

    }
    public function viewProfile(){
        $user=auth()->user();
        if($user->role==0 || $user->role==1 || $user->role==2){
            return view('auth.view_profile',['user'=>$user]);
        }else if($user->role==3){
            $nodal_officer=NodalOfficer::findOrFail($user->nodal_officer_id);
            return view('auth.view_profile',['user'=>$user,'nodal_officer'=>$nodal_officer]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }
    public function editProfileGet($user_id=null){
        if($user_id==null){
            $user=auth()->user();
        }else{
            $user=User::findOrFail($user_id);
        }
        if($user->role==0 || $user->role==1 || $user->role==2){
            return view('auth.edit_profile',['user'=>$user]);
        }else if($user->role==3){
            $nodal_officer=NodalOfficer::findOrFail($user->nodal_officer_id);
            return view('auth.edit_profile',['user'=>$user,'nodal_officer'=>$nodal_officer]);
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }
    public function editProfilePost(Request $request){
        $user=User::findOrFail($request['user_id']);
        if($user->role==0 || $user->role==1 || $user->role==2){
            $user->name=$request->input('full_name');
            $user->save();
            return redirect()->back()->with('success','Profile Updated Successfully');
        }else if($user->role==3){
            $nodal_officer=NodalOfficer::findOrFail($user->nodal_officer_id);
            $user->name=$request->input('full_name');
            $user->save();
            $nodal_officer->officer_contact=$request->input('officer_cotact');
            $nodal_officer->officer_designation=$request->input('officer_designation');
            $nodal_officer->save();
            return redirect()->back()->with('success','Profile Updated Successfully');
        }else{
            return  abort(403, 'Unauthorized action.');
        }
    }
    public function pwdChangeGet(){
        return view('auth.change_pwd');
    }
    public function pwdChangePost(Request $request){
        $user=auth()->user();
       $validated= $request->validate([
            'password'=>'required',
            'cnf_password'=>'required',
        ]);
        if($request['password']==$request['cnf_password']){
            $user->password=Hash::make($request['password']);
            $user->default_pwd_change=true;
            $user->save();
            return redirect()->intended('dashboard');
        }else{
            return view('auth.change_default_pwd')->withErrors(['pwd_not_match'=>'Password and Confirm password does not match']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function showRegister(){
        $sub_divisions=SubDivision::get();
        return view('auth.create_user',['sub_divisions'=>$sub_divisions]);
    }

    public function userJurisdiction(Request $request){
        if($request->get('user_role')=="moderate_user"){
            $sub_divisions=SubDivision::select('id','sub_division_name')->get();
            return response()->json(json_encode($sub_divisions));
        }else if($request->get('user_role')=="normal_user"){
            $nodal_officers=NodalOfficer::select('id','officer_name')->get();
            return response()->json(json_encode($nodal_officers));
        }
    }

    public function createUser(Request $request){
       $request->validate(
                    ['full_name'=>'required',
                    'email'=>'required | email',
                    'password'=>'required | min:6 | max:12',
                    'user_role'=>'required',
                    'user_jurisdiction'=>'required' 
        ]);

        $user_data=$request->all();
        
        $user=User::create(
            ['name'=>$user_data['full_name'],
            'email'=>$user_data['email'],
            'password'=>Hash::make($user_data['password']),
            'role'=>$this->user_role[$user_data['user_role']],
            'active'=>true
        ]);

        if($user_data['user_role']=='moderate_user'){
            $user->sub_division_id=$user_data['user_jurisdiction'];
            $user->save();
        }else if($user_data['user_role']=='normal_user'){
            $user->nodal_officer_id=$user_data['user_jurisdiction'];
            $user->save();
        }

        return redirect()->back()->withSuccess('User Created Successfully');

    }

    public function deleteUser($userId){
        $user=User::findOrFail($userId);
        $user->active=false;
        $user->save();
        return redirect()->back()->with('success','User account deactivated successfully');
    }

    public function showAllUser(){
        $user=auth()->user();
        $user_data=array();
        if($user->role==0 || $user->role==1){
            $users=User::where([['active','=',true],['id','!=',$user->id]])->get();
            return view('auth.show_all_user',['users'=>$users]);
        }else if($user->role==2){
            $nodal_officers=ReliefCamp::select('nodal_officer_id')->where('sub_division_id',$user->sub_division_id)->get();
            foreach($nodal_officers as $nodal_officer){
               $user1= User::where([['active','=',true],['id','!=',$user->id],['nodal_officer_id','=',$nodal_officer->nodal_officer_id]])->first();
                if($user1!=null)
                    $user_data[]=$user1;
            }
            return view('auth.show_all_user',['users'=>$user_data]);
        }
    }
}

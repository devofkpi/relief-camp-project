<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash};
use Session;
use App\Models\{SubDivision,NodalOfficer};

use App\Models\User;

class UserController extends Controller
{

    private $user_role=[
        'super_user'=>0,
        'admin_user'=>1,
        'moderate_user'=>2,
        'normal_user'=>3
    ];
    //
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
            return redirect()->intended('dashboard');
        }

         
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function viewProfile(){
        
    }
    public function editProfile(){

    }
    public function changePassword(){

    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
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

    public function showAllUser(){

        $users=User::get();
        return view('auth.show_all_user',['users'=>$users]);
    }
}

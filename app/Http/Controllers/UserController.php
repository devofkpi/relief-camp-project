<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash};
use Session;

use App\Models\User;

class UserController extends Controller
{

    private $user_role=[
        'super_user'=>0,
        'admin_user'=>1,
        'normal_user'=>2
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

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }


    public function showRegister(){
        return view('auth.create_user');
    }

    public function createUser(Request $request){
       $request->validate(
                    ['full_name'=>'required',
                    'email'=>'required | email',
                    'password'=>'required | min:6 | max:12', 
        ]);

        $user_data=$request->all();

        $user=User::create(
            ['name'=>$user_data['full_name'],
            'email'=>$user_data['email'],
            'password'=>Hash::make($user_data['password']),
            'role'=>$this->user_role[$user_data['user_role']],
            'active'=>true
        ]);

        return redirect()->back()->withSuccess('User Created Successfully');

    }

    public function showAllUser(){

        $users=User::get();
        return view('auth.show_all_user',['users'=>$users]);
    }
}

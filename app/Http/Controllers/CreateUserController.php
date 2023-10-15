<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;



class CreateUserController extends Controller
{
    //
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
        ]);

        return redirect('home');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register(){
        return view('auth.register');

    }


    public function registerRequest(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:20',
            'email'=>'required|email',
            'password'=>'required|min:5|max:20',
            'comfirmpassword'=>'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login');
    }


    public function login(){
        return view('auth.login');
    }


    public function loginRequest(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password'=>'required|min:5|max:20'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect('index');
        }
            return redirect("login")->with('msg' , 'email or password not valid');
    }


    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}

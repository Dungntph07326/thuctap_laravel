<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        // if(Auth::attempt([
        //     'email' => $email,
        //     'password' => $password
        // ])) {
        //     return redirect()->route('cate.add');
        // } 
        // return redirect()->route('login');


        // return view('auth.login-data', [
        //     'loginusername' => $username,
        //     'loginpassword' => $password
        // ]);
    }
}

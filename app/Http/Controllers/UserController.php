<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function registrationForm(){
        return view('user.registration');
    }

    function register(Request $req){
        $fields = $req->validate([
            'userName' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $fields['userName'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        echo "registration successfull";
    }

    function loginForm(){
        return view('user.login');
    }

    function login(Request $req){
        $fields = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response('email or password is incorrect');
        }

        Auth::guard('web')->login($user);
        return redirect()->route('user.home');
        //return view('user.login');
    }

    function home(){
        return view('user.dashboard');
    }

    function logout(){
        Auth::guard('web')->logout();
       // return redirect()->route('user.login');
       return redirect('/');
    }
}

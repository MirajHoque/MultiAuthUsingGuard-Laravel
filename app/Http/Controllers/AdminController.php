<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function loginForm(){
        return view('admin.login');
    }

    function login(Request $req){
        $fields = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', '=', $fields['email'])->first();
        if(!$admin || !Hash::check($fields['password'], $admin->password)){
            return response('email or password is incorrect');
        }

        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.home');
        //return view('user.login');
    }

    function home(){
        return view('admin.dashboard');
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}

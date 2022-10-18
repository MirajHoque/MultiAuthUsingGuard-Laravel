<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

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
        return redirect()->route('admin.login');
    }

    public function index()
    {
        $users = Admin::orderBy('id', 'DESC')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $role = Role::where('id', '=', $request->roleId)->first();
            $permissions = $role->permission;
            return $permissions;

        }

        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new Admin();

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = $fields['password'];
        $user->save();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach($request->permissions as $permission){
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();
        $userRoles = $user->roles->first();
        if($userRoles){
            $rolePermissions = $userRoles->permission;
        }
        else{
            $rolePermissions = null;
        }
       
        $userPermissions = $user->permissions;

        return view('admin.user.edit', compact('user', 'roles', 'userRoles', 'rolePermissions', 'userPermissions'));
    }

    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = Admin::findOrFail($id);

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){
            foreach($request->permissions as $permission){
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('admin.user.index');

    }

}

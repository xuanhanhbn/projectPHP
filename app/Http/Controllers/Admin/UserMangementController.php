<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User\User;

class UserMangementController extends Controller
{
    public function index(){
        return view("admin.pages.user-management");
    }
    public function createIndex(){
        return view ("admin.pages.user-create");
    }
    public function create(Request $request)
    {
         
        $validateData = $request->validate([
                'firstname' => 'required|min:5|max:255',
                'lastname' => 'required|min:5|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'phone' => 'required|digits_between:10,12|numeric|unique:users,phone',
                'password' => 'required|min:5|max:255',
                'role' => 'required'
             ]);
             $user = User::create([
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'city' => $request->city,
                'address' => $request->address,
                'country' => $request->country,
                'postal' => $request->postal
            ]);
        // $role = Role::create([
        //     "user_id"=>$user->id,
        //     "role"=>"USER"
        // ]);
        // auth()->login($user);

        // return redirect(route("user-management"));
    }
}


// 
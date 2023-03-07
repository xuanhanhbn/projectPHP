<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits_between:10,12|numeric|unique:users,phone',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'verifypassword' => 'required_with:password|same:password|min:5|max:255',
            'terms' => 'required'
        ]);
        $user = User::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'city' => $request->city,
            'address' => $request->address,
        ]);
        $role = Role::create([
            "user_id"=>$user->id,
            "role"=>"USER"
        ]);
        auth()->login($user);

        return redirect(route("user_home"));
    }
}
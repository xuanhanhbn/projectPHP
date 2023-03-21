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
        // $userId = Auth::user()->id;
        $user = User::all();
        $role = Role::all();
        // dd($role);
        return view("admin.pages.user-management",['user'=>$user,'role'=>$role]);
    }
    public function createIndex(){
        return view ("admin.pages.user-create");
    }
    public function create(Request $request)
    {
         
        $validateData = $request->validate([
                // 'firstname' => 'required|min:5|max:255',
                // 'lastname' => 'required|min:5|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'phone' => 'required|digits_between:10,12|numeric|unique:users,phone',
                'password' => 'required|min:5|max:255',
                'role' => 'required'
             ],[
                "required"=>"Vui lòng nhập thông tin",
                "string"=> "Phải nhập vào là một chuỗi văn bản",
                "min"=> "Phải nhập :attribute  tối thiểu :min",
             ]);
            try {
                $admin = User::create([
                    'phone' => $request->get('phone'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->password),
                    'firstname' => $request->get('firstname'),
                    'lastname' => $request->get('lastname'),
                    'city' => $request->get('city'),
                    'address' => $request->get('address'),
                    'country' => $request->get('country'),
                    'postal' => $request->get('postal'),
                    'role'=>$request->get('role')
                ]);
                    $role = Role::create([
                    "user_id"=>$admin->id,
                    "role"=>"admin"
                 ])
                 ;
                  return redirect()->to("admin/user-management")->with("success","Create Account Success!");

            } catch (\Throwable $e) {
                return redirect()->back()->with("error",$e->getMessage());
            }
    
        // auth()->login($user);

    }

}


// 
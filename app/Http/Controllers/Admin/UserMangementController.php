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
        return view("admin.pages.user-management",['user'=>$user]);
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
             ],[
                "required"=>"Vui lòng nhập thông tin",
                "string"=> "Phải nhập vào là một chuỗi văn bản",
                "min"=> "Phải nhập :attribute  tối thiểu :min",
             ]);
            try {
                $user = User::create([
                    'phone' => $request->get('phone'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->password),
                    'firstname' => $request->get('firstname'),
                    'lastname' => $request->get('lastname'),
                    'city' => $request->get('city'),
                    'address' => $request->get('address'),
                    'country' => $request->get('country'),
                    'postal' => $request->get('postal')
                ]);
                  return redirect()->to("admin/user-management")->with("success","Thêm sản phẩm thành công");

            } catch (\Throwable $th) {
                return redirect()->back()->with("error",$e->getMessage());
            }
        // $role = Role::create([
        //     "id"=>$user->id,
        //     "role"=>"ADMIN"
        // ]);
        // auth()->login($user);

    }
    public function delete(User $user, Product $product) {
        $product = session()->has("product") && is_array(session("product"))?session("product"):[];
        foreach ($product as $key=>$item){
            if($item->id == $user->id){
                unset($product[$key]);
                break;
            }
        }
        session(["product"=>$product]);
        return redirect()->back();
    }
}


// 
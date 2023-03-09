<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Category::all();
        return view("user.pages.index",[
            "data"=>$data,
        ]);
    }
}

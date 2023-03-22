<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $category = Category::all();
        return view("user.pages.about",["category"=>$category]);
    }
}

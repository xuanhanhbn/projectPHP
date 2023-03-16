<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserMangementController extends Controller
{
    public function index(){
        return view("admin.pages.user-management");
    }
    public function createIndex(){
        return view ("admin.pages.user-create");
    }
    public function create($request){
        
    }
}

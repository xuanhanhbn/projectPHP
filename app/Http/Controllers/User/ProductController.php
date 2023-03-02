<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexListing(){
        return view("user.pages.products");
    }
    public function indexSingle(){
        return view("user.pages.single-product");
    }
}

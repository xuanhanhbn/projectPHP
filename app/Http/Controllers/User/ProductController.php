<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexListing(){
        $data =  Product::all();
        return view("user.pages.products",[
            "data"=>$data
        ]);
    }
    public function indexSingle(){
        return view("user.pages.single-product");
    }
}

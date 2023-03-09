<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
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
    public function indexCategory($categoryId){
        $category = Category::all();
        $data =  Product::where('category_id',$categoryId)->paginate(12);
        return view("user.pages.products",[
            "data"=>$data,
            "category"=>$category
        ]);
    }
    public function indexSingle($productId){
        dd($productId);
        return view("user.pages.single-product");
    }
}

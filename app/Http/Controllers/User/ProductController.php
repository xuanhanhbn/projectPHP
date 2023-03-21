<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductRating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexListing(Request $request)
    {
        if ($request->get('key') == null) {
            $data = Product::paginate(12);
            return view("user.pages.products", [
                "data" => $data,
                "key" => null
            ]);
        }
        $key = $request->get('key');
        $data = Product::select("*")
            ->where('title', 'LIKE', '%' . $key . '%')
            ->paginate(12);
            return view("user.pages.products", [
                "data" => $data,
                "key" => $key
            ]);
    }
    public function indexCategory(Request $request,$categoryId)
    {
        $category = Category::all();
        if ($request->get('key') == null) {
            $data = Product::where('category_id', $categoryId)->paginate(12);
            return view("user.pages.products", [
                "data" => $data,
                "category" => $category,
                "key" => null
            ]);
        }
        $key = $request->get('key');
        $data = Product::select("*")
            ->where('title', 'LIKE', '%' . $key . '%')
            ->paginate(12);
        return view("user.pages.products", [
            "data" => $data,
            "key" => $key,
            "category" => $category
        ]);
//        $category = Category::all();
//        $data = Product::where('category_id', $categoryId)->paginate(12);
//        return view("user.pages.products", [
//            "data" => $data,
//            "category" => $category
//        ]);
    }
    public function indexSingle($id)
    {
        $paths = ProductImage::where('product_id',$id)->paginate(12);
        $ratings = ProductRating::where('product_id', $id)->paginate(12);
        $item = Product::where('id', $id)->first();
        return view("user.pages.single-product",[
            "item" => $item,
            "ratings" => $ratings,
            "paths" =>$paths
        ]);
    }
    public function comment($id){
        $ratings = ProductRating::where('product_id', $id)->paginate(12);
        $item = Product::where('id', $id)->first();
        return view("user.pages.single-product",[
            "item" => $item,
            "ratings" => $ratings
        ]);
    }
    public function store(Request $request, $id){
        try {
            ProductRating::create([
                "rate"=>$request->get("rate"),
                "comment"=>$request->get("comment"),
                "product_id"=>$request->get("product_id")
            ]);
            return redirect()->to("product/$id")->with("success","Thêm comment thành công");
        }catch (\Exception $e){
            return redirect()->back()->with("error",$e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
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
    public function indexCategory($categoryId)
    {
        $category = Category::all();
        $data = Product::where('category_id', $categoryId)->paginate(12);
        return view("user.pages.products", [
            "data" => $data,
            "category" => $category
        ]);
    }
    public function indexSingle($id)
    {
        $item = Product::where('id', $id)->first();
        return view("user.pages.single-product",[
            "item" => $item
        ]);
    }
}

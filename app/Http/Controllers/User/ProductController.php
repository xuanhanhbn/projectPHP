<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use DB;

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
    // add product form products page to cart
    public function AddToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                "thumbnail" => $product->thumbnail,
            ];

        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            "message" => 'ok'
        ], 200);
    }
    // // search name
    // public function Search(Request $request)
    // {
    //     $data = Product::where('title', 'like', '%' . $request->input('query') . '%')->get();
    //     return view('user.pages.search', ['products' => $data]);
    // }
}
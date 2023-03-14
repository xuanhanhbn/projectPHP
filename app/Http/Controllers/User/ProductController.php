<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function indexListing()
    {
        $data =  Product::all();
        return view("user.pages.products", [
            "data" => $data
        ]);
    }
    public function indexSingle()
    {
        return view("user.pages.single-product");
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
    // search name
    public function Search(Request $request)
    {
        $data = Product::where('title', 'like', '%' . $request->input('query') . '%')->get();
        return view('user.pages.search', ['products' => $data]);
    }
}

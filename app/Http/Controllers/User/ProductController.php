<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\Recipient;
use App\Models\Product\Product;
use App\Models\User\Role;
use App\Models\User\Likeproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function indexListing(Request $request)
    {
        $category = Category::all();
        $recipient = Recipient::all();
        $key = $request->get('key');
        $recipientFilter = $request->get('recipient');
        $categoryFilter = $request->get('category');
        $priceFilter = $request->get('price');
        $orderFilter = $request->get('order');
        $query = Product::where('title', 'LIKE', '%' . $key . '%');
        if ($recipientFilter != null) {
            $recipientFilterId = Recipient::where("key", "LIKE", $recipientFilter)->first()->id;
            $query = $query->where('recipient_id', '=', $recipientFilterId);
        }
        if ($categoryFilter != null) {
            $categoryFilterId = Category::where("key", "LIKE", $categoryFilter)->first()->id;
            $query = $query->where('category_id', '=', $categoryFilterId);
        }
        if ($priceFilter != null) {
            $query = $query->whereRaw("price " . $priceFilter);
        }
        $query = $query->orderBy("price", $orderFilter ? $orderFilter : "ASC");
        $data = $query->paginate(12);
        return view("user.pages.products", [
            "data" => $data,
            "key" => $key,
            "category" => $category,
            "recipient" => $recipient,
            "recipientFilter" => $recipientFilter,
            "categoryFilter" => $categoryFilter,
            "priceFilter" => $priceFilter,
            "orderFilter" => $orderFilter
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
        return view("user.pages.single-product", [
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

    public function liked()
    {
        return view('user.pages.likeproducts');
    }

    public function like(Request $request)
    {
        $productId = $request->productId;
        $userId = Auth::user()->id;

        $liked = Likeproduct::where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)->first();
            
        if ($liked) {
            $liked->delete();
        } else {
            Likeproduct::create([
                "user_id" => $userId,
                "product_id" => $productId,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        $total = 0;
        foreach ($cart as $item) {
            if ($item->Product != null) {
                $total += $item->quantity * $item->Product->price;
            }
        }
        return view("user.pages.cart", [
            "cart" => $cart,
            "total" => $total
        ]);
    }
    public function add(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        $userId = Auth::user()->id;
        if ($productId != null && $quantity != null) {
            $cartItem = UserCart::where("product_id", "=", $productId)-> first();
            if($cartItem){
                $cartItem -> quantity += $quantity;
                $cartItem->save();
            }else{
                UserCart::create([
                    "quantity" => $quantity,
                    "user_id" => $userId,
                    "product_id" => $productId,
                ]);
            }
        }
        return redirect()->route('user_cart');
    }

    public function checkout(Request $request)
    {
        dd($request);
    }

}
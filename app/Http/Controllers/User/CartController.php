<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        return view("user.pages.cart",[
            "cart" => $cart
        ]);
    }
    public function add(Request $request){
        $productId = $request -> productId;
        $quantity = $request -> quantity;
        $userId = Auth::user()->id;
        if($productId != null && $quantity != null){
            UserCart::create([
                "quantity" => $quantity,
                "user_id" => $userId,
                "product_id" => $productId,
            ]);
        }
        $this->index();
    }
}

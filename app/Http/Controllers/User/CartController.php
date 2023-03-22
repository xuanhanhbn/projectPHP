<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\SubOrder;
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
        if(count($cart) == 0){
            return view("user.pages.cartNull");
        }

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
    public function update(Request $request){
        $cart = $request->cart;
        if(is_array($cart)){
            foreach($cart as $cartItem){
                if($cartItem["quantity"] ==0){
                    UserCart::where("id","=",$cartItem["id"])-> delete();
                }else{
                    UserCart::where("id","=",$cartItem["id"])-> update(["quantity" => $cartItem["quantity"]]);
                }
            }
        }
        return redirect()->route('user_cart');
    }
    public function payment(Request $request) {
        if(is_array($request->cart)){
            foreach($request->cart as $cartItem){
                if($cartItem["quantity"] ==0){
                    UserCart::where("id","=",$cartItem["id"])-> delete();
                }else{
                    UserCart::where("id","=",$cartItem["id"])-> update(["quantity" => $cartItem["quantity"]]);
                }
            }
        }
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        $total = 0;
        foreach ($cart as $item) {
            if ($item->Product != null) {
                $total += $item->quantity * $item->Product->price;
            }
        }
        return view("user.pages.payment",["total" => $total,"cart" =>$cart]);
    }
    public function transaction(Request $request){
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        $total = 0;
        foreach($cart as $cartItem){
            $total += $cartItem-> quantity * $cartItem->Product->price;
        }
        $order = Order::create([
            "order_status" => "Prepared",
            "total"=>$total,
            "payment_type"=>"Cod",
            "shipping_address" => Auth::user()->address,
            "receiver_contact" => Auth::user()->phone,
            "user_id" => Auth::user()->id,
        ]);
        foreach($cart as $cartItem){
            SubOrder::create([
                "quantity" => $cartItem -> quantity,
                "sub_total" => $cartItem -> quantity * $cartItem -> Product->price,
                "status" => "pending",
                "order_id" => $order -> id,
                "product_id" => $cartItem->product_id, 
            ]);
            $cartItem->delete();
        }
        return redirect(route("user_order",["order_id" => $order->id]));
    }
}

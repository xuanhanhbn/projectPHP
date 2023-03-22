<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\SubOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function indexListing(){
        $orders = Order::where("user_id","=", Auth::user()->id)->orderBy('created_at','desc')->get();
        return view("user.pages.list-order",["orders" => $orders]);
    }
    public function index($order_id){
        $order = Order::where("id", "=", $order_id)->where("user_id","=", Auth::user()->id)->first();
        return view("user.pages.order",["order" => $order]);
    }
    public function complete(Request $request){
        $order = Order::where("id","=",$request->order_id)->first();
        if($order != null){
            $order->order_status="Succeed";
            $order->payment_status=true;
            $order->save();
        }
        return redirect(route("user_order", ["order_id" => $request->order_id]));

    }
}

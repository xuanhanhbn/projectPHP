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
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = session()->get('cart');
       if($carts == null) {
        return view("user.pages.cartNull");
       }else{
        return view("user.pages.cart", compact('carts'));
       }
    }
}

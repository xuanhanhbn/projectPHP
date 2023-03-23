<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;


class OrderController extends Controller
{
    public function listAll()
    {
        $order = Order::all();
        return view("admin.order.list", [
            "order" => $order,
        ]);
    }
    public function edit($id, Request $request)
    {
        $statusFilter = $request->get('order_status');
        $order = Order::where('id', '=', $id)->first();
        return view("admin.order.edit", ['order' => $order,'statusFilter'=>$statusFilter]);
    }

    public function update(Order $order, Request $request)
    {
        $order->update([
            'order_status' => $request->get('order_status')
        ]);
        return redirect(route('admin.order.list')) ;
    }
}

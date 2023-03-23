<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\MailOrder;
use App\Models\Order\Order;
use App\Models\Order\SubOrder;
use App\Models\Product\Product;
use App\Models\User\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        $total = 0;
        if (count($cart) == 0) {
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
            $cartItem = UserCart::where("product_id", "=", $productId)->first();
            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                UserCart::create([
                    "quantity" => $quantity,
                    "user_id" => $userId,
                    "product_id" => $productId,
                ]);
            }
        }
        return redirect()->route('user_cart');
    }
    public function update(Request $request)
    {
        $cart = $request->cart;
        if (is_array($cart)) {
            foreach ($cart as $cartItem) {
                if ($cartItem["quantity"] == 0) {
                    UserCart::where("id", "=", $cartItem["id"])->delete();
                } else {
                    UserCart::where("id", "=", $cartItem["id"])->update(["quantity" => $cartItem["quantity"]]);
                }
            }
        }
        return redirect()->route('user_cart');
    }
    public function payment(Request $request)
    {
        if (is_array($request->cart)) {
            foreach ($request->cart as $cartItem) {
                if ($cartItem["quantity"] == 0) {
                    UserCart::where("id", "=", $cartItem["id"])->delete();
                } else {
                    UserCart::where("id", "=", $cartItem["id"])->update(["quantity" => $cartItem["quantity"]]);
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
        return view("user.pages.payment", ["total" => $total, "cart" => $cart]);
    }
    public function transaction(Request $request)
    {
        $userId = Auth::user()->id;
        $cart = UserCart::where('user_id', $userId)->get();
        $order = Order::create([
            "order_status" => "Prepared",
            "total" => $request->total,
            "payment_type" => $request->payment_method,
            "shipping_address" => $request->address,
            "receiver_phone" => $request->phone,
            "receiver_name" => $request->name,
            "user_id" => Auth::user()->id,
        ]);
        foreach ($cart as $cartItem) {
            SubOrder::create([
                "quantity" => $cartItem->quantity,
                "sub_total" => $cartItem->quantity * $cartItem->Product->price,
                "status" => "pending",
                "order_id" => $order->id,
                "product_id" => $cartItem->product_id,
            ]);
            $cartItem->Product->sold += $cartItem->quantity;
            $cartItem->Product->in_stock -= $cartItem->quantity;
            $cartItem->Product->save();
            $cartItem->delete();
        }
        if ($request->payment_method == "Paypal") {
            $this->processTransaction($order);
        }else{
            return redirect(route("user_order", ["order_id" => $order->id]));
        }
    }

    public function processTransaction(Order $order)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', ['order' => $order->id]),
                "cancel_url" => route('cancelTransaction', ['order' => $order->id]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($order->total, 0, ".", "")
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href'])->send();
                }
            }
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    public function successTransaction(Order $order)
    {
        $order->payment_status = true;
        $order->save();
        $email = $order->User->email;
        Mail::to($email)->send(new MailOrder($order));
        return redirect(route("user_order", ["order_id" => $order->id]));
        // chuyen trang thai da thanh toan
    }

    public function cancelTransaction(Order $order)
    {
        return redirect(route("user_order", ["order_id" => $order->id]));
    }
}
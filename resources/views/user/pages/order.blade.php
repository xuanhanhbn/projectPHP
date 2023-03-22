@extends('user.layouts.app')
@section('custom_css')
    <style>
        .order-info h3 {
            font-weight: 600;
        }

        .order-info h5 {
            font-weight: 600;
        }

        .order-info span {
            font-weight: 300;
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <!-- Breadcrumb Section Begin -->
        <!-- ***** Main Banner Area End ***** -->
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="row" style="flex-direction: row">
                        <div class="col-lg-6 order-info">
                            <h3 style="margin-top: 30px">Order #<span>{{ $order->id }}</span></h3>
                            <h5 style="margin-top: 20px">Shipping address:
                                <span>{{ $order->shipping_address }}</span>
                            </h5>
                            <h5 style="margin-top: 20px">Receiver contact:
                                <span>{{ $order->receiver_contact }}</span>
                            </h5>
                            <h5 style="margin-top: 20px">Order time: <span>{{ $order->created_at }}</span>
                            </h5>
                        </div>
                        <div class="col-lg-6 order-info"
                            style="display: flex; flex-direction: column; gap: 10px; background: #f5f5f5; padding: 30px; margin-bottom: 50px;">
                            <h3>Total (VND): {{ number_format($order->total, 0) }}</h3>
                            <h5>Order status: <div
                                    style="
                                        display: inline-block;
                                        font-weight: 500;
                                        padding: 5px 10px;
                                        border-radius: 20px;
                                        background-color:{{ $order->order_status == 'Succeed' ? 'green' : 'yellow' }}">
                                    {{ $order->order_status }}</div>
                            </h5>
                            <h5>Payment method: {{ $order->payment_type }}</h5>
                            <h5>Payment status:
                                <div
                                    style="
                                            display: inline-block;
                                            font-weight: 500;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            background-color:{{ $order->payment_status ? 'green' : 'yellow' }}">
                                    {{ $order->payment_status ? 'Succeeded' : 'Pending' }}</div>
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->SubOrder as $subOrder)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ $subOrder->Product->thumbnail }}" alt=""
                                                    width="75" height="75">
                                                <h5>{{ $subOrder->Product ? $subOrder->Product['title'] : '' }}</h5>
                                            </td>
                                            <td class="shoping__cart__price" id="price">
                                                {{ number_format($subOrder->Product ? $subOrder->Product['price'] : 0, 0) }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                {{ $subOrder->quantity }}
                                            </td>
                                            <td class="shoping__cart__total" id="subtotal_{{ $subOrder->id }}">
                                                {{ number_format($subOrder->Product ? $subOrder->Product['price'] * $subOrder->quantity : 0, 0) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @endsection

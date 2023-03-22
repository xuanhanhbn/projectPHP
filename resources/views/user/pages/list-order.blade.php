@extends('user.layouts.app')
@section('custom_css')
    <style>
        .order_tr:hover{
            opacity: 0.5;
            text-decoration: underline;
        }
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
                    <div class="col-lg-12">
                        <h2 style="font-weight: 600; margin-bottom:40px">My Orders</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Payment method</th>
                                        <th>Payment status</th>
                                        <th>Order time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <a class="order_tr" href="{{route("user_order",["order_id" => $order->id])}}">
                                                    <h5>{{ $order->id }}</h5>
                                                </a>
                                            </td>
                                            <td>
                                                <div
                                                    style="display: inline-block; font-weight: 500; padding: 5px 10px; border-radius: 20px; background-color:{{ $order->order_status == 'Succeed' ? 'green' : 'yellow' }}">
                                                    {{ $order->order_status }}</div>
                                            </td>
                                            <td class="shoping__cart__price" id="price">
                                                {{ number_format($order->total, 0) }}
                                            </td>
                                            <td>
                                                {{ $order->payment_type }}
                                            </td>
                                            <td>
                                                <div
                                                    style="
                                            display: inline-block;
                                            font-weight: 500;
                                            padding: 5px 10px;
                                            border-radius: 20px;
                                            background-color:{{ $order->payment_status ? 'green' : 'yellow' }}">
                                                    {{ $order->payment_status ? 'Succeeded' : 'Pending' }}</div>
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
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

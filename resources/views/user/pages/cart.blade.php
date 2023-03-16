@extends('user.layouts.app')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">


        <!-- Breadcrumb Section Begin -->
        <div class="page-heading about-page-heading" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-content">
                            <h2>Shopping Cart</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->
        <!-- Breadcrumb Section End -->

        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($cart as $product)
                                    @php
                                    $total += $product->Product ? $product->Product['price'] * $product->quantity : 0;
                                    @endphp
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="img/cart/cart-2.jpg" alt="">
                                                <h5>{{ $product->Product ? $product->Product['title'] : '' }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ number_format($product->Product ? $product->Product['price'] : 0, 0) }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $product->quantity }}">
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ number_format($product->Product ? $product->Product['price'] * $product->quantity : 0, 0) }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="#" class="primary-btn cart-btn cart-btn-right">
                                Upadate Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>${{number_format($total)}}</span></li>
                                <li>Total <span>$454.98</span></li>
                            </ul>
                            <a href="{{route('payment')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @endsection

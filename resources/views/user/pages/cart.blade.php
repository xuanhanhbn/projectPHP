@extends('user.layouts.app')
@section('custom_js')
    <script type="text/javascript">
        function autoCal(product, value) {
            subTotal = document.getElementById(`subtotal_${product.id}`);
            totalEl = document.getElementById("total");
            subTotal.innerText = (product.product.price * value).toLocaleString();
            cart = <?php echo $cart; ?>;
            total = 0;
            cart.forEach(element => {
                sub = document.getElementById(`subtotal_${element.id}`);
                total += parseFloat(sub.innerText.replaceAll(",", ""));
            });
            totalEl.innerText = total.toLocaleString();
            checkoutBtn = document.getElementById("checkoutBtn");
            if (total <= 0) {
                checkoutBtn.disabled = true;
                checkoutBtn.style.opacity = 0.5;
            } else {
                checkoutBtn.disabled = false;
                checkoutBtn.style.opacity = 1;
            }
        }
    </script>
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
                    <form method="POST" action="{{ route('payment') }}">
                        @csrf
                        <div class="row" style="flex-direction: row">
                            <div class="col-lg-6">
                                <div class="shoping__cart__btns">
                                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                    <h1 style="margin-top: 30px">Shopping Cart</h1>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="shoping__checkout">
                                    <h5>Cart Total (VND):</h5>
                                    <ul>
                                        <li>
                                            <span id="total"
                                                style="font-size: 30px; color: #000000">{{ number_format($total, 0) }}</span>
                                        </li>
                                    </ul>
                                    <a href="#" class="primary-btn cart-btn cart-btn-right">
                                        Upadate Cart</a>
                                    <button class="primary-btn" id="checkoutBtn"
                                        style="border: none; opacity: @if ($total <= 0) 0.5 @else 1 @endif"
                                        @if ($total <= 0) disabled @endif>PROCEED TO CHECKOUT</button>

                                </div>
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
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $product)
                                            <input type='hidden' name="cart[{{ $loop->index }}]['id']"
                                                value='{{ $product->id }}'>
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img src="img/cart/cart-2.jpg" alt="">
                                                    <h5>{{ $product->Product ? $product->Product['title'] : '' }}</h5>
                                                </td>
                                                <td class="shoping__cart__price" id="price">
                                                    {{ number_format($product->Product ? $product->Product['price'] : 0, 0) }}
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="number" step="1" min="0" max=""
                                                            name="cart[{{ $loop->index }}]['quantity']"
                                                            value="{{ $product->quantity }}" title="Qty"
                                                            class="input-text qty text" size="4" pattern=""
                                                            inputmode=""
                                                            onchange="autoCal({{ $product }}, this.value)">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total" id="subtotal_{{ $product->id }}">
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
                    </form>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @endsection

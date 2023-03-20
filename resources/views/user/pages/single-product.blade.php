@extends('user.layouts.app')
@section('custom_js')
<script type="text/javascript">
    function autoCal() {
        var qty = document.getElementById("quantity").value;
        var totalEl = document.getElementById("totalPrice");
        var price = <?php echo $item->price; ?>;
        var totalPrice = qty * price;
        totalEl.innerText = "Total: VND " + totalPrice.toLocaleString();
    }
</script>
@endsection

@section('content')
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
{{-- @include('user.layouts.navbars.guest.topnav') --}}
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{ $item->thumbnail }}" alt="">
                    <div class="like-share">
                        <div class="share">
                            <span>Share: </span>
                            <div class="share-icon">
                                <i class="fa-brands fa-facebook-messenger fa-xl"></i>
                                <i class="fa-brands fa-facebook fa-xl"></i>
                                <i class="fa-brands fa-twitter fa-xl"></i>
                                <i class="fa-brands fa-linkedin-in fa-xl"></i>
                            </div>
                        </div>
                        <div class="axc2"></div>
                        <form method="POST" action="{{ route('liked-products-create') }}">
                            @csrf
                            <input type='hidden' name='productId' value='{{$item->id}}'>
                            <div class="like">
                                <span>Like </span>
                                <div class="liked-icon">
                                    <button type="submit">
                                        <i id="like-button" class="fa fa-xl fa-heart-o not-liked"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4 class="item-title">{{ $item->title }}</h4>
                    <span class="price">VND {{ number_format($item->price, 0) }}</span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt
                        ut labore.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                    </div>
                    <form method="POST" action="{{ route('user_cart.add') }}">
                        @csrf
                        <input type='hidden' name='productId' value='{{$item->id}}'>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>No. of Orders</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" id="quantity" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" onchange="autoCal()">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4 id="totalPrice">Total: VND {{ number_format($item->price, 0) }}</h4>
                            <div class="main-border-button">
                                <button type="submit">Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Product Area Ends ***** -->
@endsection
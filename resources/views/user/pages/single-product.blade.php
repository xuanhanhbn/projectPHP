@extends('user.layouts.app')
@section('custom_js')
    <script type="text/javascript">
        function autoCal() {
            var qty = document.getElementById("quantity").value;
            var totalEl = document.getElementById("totalPrice");
            var price = <?php echo $item->price; ?>;
            var totalPrice = qty * price;
            totalEl.innerText = "Total: USD " + totalPrice.toLocaleString();
        };
        $('.main-carousel').owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            margin: 10,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
        });
        $('.sub-carousel').owlCarousel({
            items: 4,
            lazyLoad: true,
            loop: true,
            margin: 10,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
        });
        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        });
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        });
    </script>
@endsection
@section('custom_css')
    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #09f;
        }

        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }

        .rating-comment {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .rating-comment img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .related-products {
            margin: 20px 0;
            border-top: 1px solid #eee;
        }

        .related-products h4 {
            margin: 20px 0;
            font-weight: 600;
        }

        .related-products h5 {
            margin-top: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        .related-products span {
            font-size: 14px;
        }

        .like-share {
            width: 100%;
            height: 24px;
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
        }

        .share {
            display: flex;
        }

        .share span {}

        .share-icon i {
            margin: 0 5px;
        }

        .axc2 {
            width: 1px;
            height: 100%;
            background-color: grey;
        }

        #like-button:hover {
            cursor: pointer;
            color: #cd0928;
        }

        #like-button.not-liked {
            color: #000;
        }

        #like-button.not-liked:hover {
            color: #cd0928;
        }

        #like-button.liked {
            color: #cd0928;
        }

        #like-button.liked-shaked {
            -webkit-animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            animation: shake 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            transform: translate3d(0, 0, 0) rotate(0deg);
            transform: rotate(0deg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            perspective: 1000px;
        }

        @-webkit-keyframes shake {

            10%,
            90% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            20%,
            80% {
                transform: translate3d(0, -2px, 0) rotate(5deg);
            }

            30%,
            50%,
            70% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            40%,
            60% {
                transform: translate3d(0, -2px, 0) rotate(-5deg);
            }
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            20%,
            80% {
                transform: translate3d(0, -2px, 0) rotate(5deg);
            }

            30%,
            50%,
            70% {
                transform: translate3d(0, 0px, 0) rotate(0deg);
            }

            40%,
            60% {
                transform: translate3d(0, -2px, 0) rotate(-5deg);
            }
        }

        .like {
            display: flex;
        }

        .right-content item-title,
        .down-content h4 {
            width: 70%;
        }

        .right-content stars,
        .down-content .stars {
            width: 30%;
        }
    </style>
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
                        <div class="main-carousel owl-carousel owl-theme">
                            <img class="owl-lazy" data-src="{{ $item->thumbnail }}" data-src-retina="{{ $item->thumbnail }}"
                                alt="">
                            <img class="owl-lazy" data-src="{{ $item->thumbnail }}" data-src-retina="{{ $item->thumbnail }}"
                                alt="">
                            <img class="owl-lazy" data-src="{{ $item->thumbnail }}" data-src-retina="{{ $item->thumbnail }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4 class="item-title">{{ $item->title }}</h4>
                        <div class="price-container">
                            <span id="price-span">USD {{ number_format($item->price, 0) }}</span>
                            <span id="sold-span">Sold: {{ $item->sold }} - In Stock: {{ $item->in_stock }}</span>
                        </div>
                        <div class="like-share">
                            <ul class="stars">
                                <?php
                                echo str_repeat('<li><i class="fa fa-star"></i></li>', $item->rating);
                                ?>
                            </ul>
                            <form method="POST" action="{{ route('liked-products-create') }}">
                                @csrf
                                <input type='hidden' name='productId' value='{{ $item->id }}'>
                                <div class="like">
                                    <div class="liked-icon">
                                        <button type="submit">
                                            <i id="like-button"
                                                class="fa fa-xl  @if ($isLikedByUser) fa-heart liked @else fa-heart-o not-liked @endif"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <form method="POST" action="{{ route('user_cart.add') }}">
                            @csrf
                            <input type='hidden' name='productId' value='{{ $item->id }}'>
                            <div class="quantity-content">
                                <div class="left-content">
                                    <h6>No. of Orders</h6>
                                </div>
                                <div class="right-content">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus" @if ($item->in_stock == 0) disabled @endif>
                                        <input type="number" id="quantity" step="1" min="1"
                                            max="{{ $item->in_stock }}" name="quantity" value="{{$item->in_stock == 0? 0: 1}}" title="Qty"
                                            class="input-text qty text" size="4" pattern="" inputmode=""
                                            onchange="autoCal()" @if ($item->in_stock == 0) disabled @endif>
                                        <input type="button" value="+" class="plus" @if ($item->in_stock == 0) disabled @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="total">
                                <h4 id="totalPrice">Total: USD {{ number_format($item->price, 0) }}</h4>
                                <div class="main-border-button">
                                    <button type="submit" @if ($item->in_stock == 0) disabled @endif>Add To Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <span style="margin: 0; line-height: 28px">{{ $item->description }}</span>
            </div>
            <div class="related-products">
                <h4>Ratings from previous buyers</h4>
                <span style="color: grey">
                    <ul class="stars" style="display: inline-block">
                        <?php
                        echo str_repeat('<li style="display: inline-block"><i class="fa fa-star"></i></li>', $item->rating);
                        ?>
                    </ul> | {{ $item->comment }} comment(s)
                </span>
                @foreach ($item->ProductRatings as $rating)
                    <div class="rating-comment">
                        <img src="https://ionicframework.com/docs/img/demos/avatar.svg" alt="">
                        <div>
                            <h5 style="margin-top: 0 ">{{ $rating->User->firstname }}
                                {{ $rating->User->lastname }} <span
                                    style="font-weight: 300; font-size: 12px; font-style: italic;">|
                                    {{ $rating->created_at }}</span></h5>
                            <ul class="stars">
                                <?php
                                echo str_repeat('<li style="display: inline-block; font-size: 10px;"><i class="fa fa-star"></i></li>', $item->rating);
                                ?>
                            </ul>
                            <span>{{ $rating->comment }}</span>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="related-products">
                <h4>Products in the same category</h4>
                <div class="sub-carousel owl-carousel owl-theme">
                    @foreach ($relatedCategoryItems as $item)
                        <div>
                            <img class="owl-lazy" data-src="{{ $item->thumbnail }}"
                                data-src-retina="{{ $item->thumbnail }}" alt="">
                            <h5>{{ $item->title }}</h5>
                            <span>USD {{ number_format($item->price, 0) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="related-products">
                <h4>Products for similar recipient</h4>
                <div class="sub-carousel owl-carousel owl-theme">
                    @foreach ($relatedRecipientItems as $item)
                        <div>
                            <img class="owl-lazy" data-src="{{ $item->thumbnail }}"
                                data-src-retina="{{ $item->thumbnail }}" alt="">
                            <h5>{{ $item->title }}</h5>
                            <span>USD {{ number_format($item->price, 0) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
@endsection

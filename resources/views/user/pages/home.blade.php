    @extends('user.layouts.app')

    @section('content')
        <!-- ***** Main Banner Area Start ***** -->
        <div class="main-banner" id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="right-content">
                            <div class="thumb">
                                <div class="inner-content">
                                    <h4>We Are Arts Shop</h4>
                                    <div class="main-border-button">
                                        <a href="{{ route('user_product-listing') }}">Purchase Now!</a>
                                    </div>
                                </div>
                                <img src="user/assets/images/banner-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->
        @foreach ($data as $item)
            <section class="section category" id="{{ $item->title }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2>{{ $item->title }} Latest</h2>
                                <a href="{{ url('/products', ['products' => $item->id]) }}">Go to the {{ $item->title }}
                                    category page</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="men-item-carousel">
                                <div class="owl-men-item owl-carousel">
                                    @foreach ($item->ProductsLatest as $product)
                                        <a href="{{route("user_product-single",["id" => $product->id])}}">
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="{{ $product->thumbnail }}" alt="">
                                                </div>
                                                <div class="down-content">
                                                    <h4>{{ $product->title }}</h4>
                                                    <span>USD {{ number_format($product->price, 0) }}</span>
                                                    <ul class="stars">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        <!-- ***** Explore Area Starts ***** -->
        <section class="section" id="explore">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-content">
                            <h2>Explore Our Products</h2>
                            <span>Browse our lovely assembled gift baskets from various categories and choose the gift
                                hamper that you want to send to your loved ones! </span>
                            <div class="quote">
                                <i class="fa fa-quote-left"></i>
                                <p>A pretty handy gift box to brighten someone's day. ❤️</p>
                            </div>
                            <p>We will carefully select the most valuable products from local suppliers and deliver a
                                beautiful gift set, gift box or basket to your friends and family with free shipping and a
                                free personalized gift message that you can add on check-out.</p>
                            <p>These gift sets are perfect as Relaxation Gifts, Birthday Gifts, Anniversary Gifts, Christmas
                                Gifts, Wedding Gifts, Housewarming Gifts, Corporate Gifts and many more! It’s a unique gift
                                that contains luxurious & premium items.</p>
                            <div class="main-border-button">
                                <a href="{{ route('user_product-listing') }}">Discover More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Friendship gift</h4>
                                    <span>Expressing close friendship</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="user/assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="user/assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Make a love gift</h4>
                                    <span>100% success</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->



    @endsection

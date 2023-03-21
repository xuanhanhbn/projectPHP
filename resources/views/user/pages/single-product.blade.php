@extends('user.layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="vendor/rating/rating.css" type="text/css">
@endsection

@section('custom_js')

    <script type="text/javascript">
        {{--function autoCal(){--}}
        {{--    var qty = document.getElementById("quantity").value;--}}
        {{--    var totalEl = document.getElementById("totalPrice");--}}
        {{--    var price = <?php echo $item->price; ?>;--}}
        {{--    var totalPrice = qty*price;--}}
        {{--    totalEl.innerText = "Total: VND " + totalPrice.toLocaleString();--}}
        {{--}--}}
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
                        @foreach($paths as $p)
                            <img src="{{$p->path}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $item->title }}</h4>
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
{{--                        <form method="POST" action="{{ route('user_cart.add') }}">--}}
{{--                            @csrf--}}
{{--                            <input type='hidden' name='productId' value='{{$item->id}}'>--}}
{{--                            <div class="quantity-content">--}}
{{--                                <div class="left-content">--}}
{{--                                    <h6>No. of Orders</h6>--}}
{{--                                </div>--}}
{{--                                <div class="right-content">--}}
{{--                                    <div class="quantity buttons_added">--}}
{{--                                        <input type="button" value="-" class="minus">--}}
{{--                                        <input type="number" id="quantity" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" onchange="autoCal()">--}}
{{--                                        <input type="button" value="+" class="plus">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="total">--}}
{{--                                <h4 id="totalPrice">Total: VND {{ number_format($item->price, 0) }}</h4>--}}
{{--                                <div class="main-border-button">--}}
{{--                                    <button type="submit">Add To Cart</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    <section>
        <div class="mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="card text-dark">
                        <div class="card-body p-4">
                            <h4 class="mb-0">Recent comments</h4>
                            <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                        </div>
                        @foreach($ratings as $rating)
                            <div class="card-body p-4">
                                <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="60"
                                         height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Lara Stewart</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">
                                                {{$rating->created_at}}
                                            </p>
                                            <ul class="list-inline d-flex" title="Average Rating">
                                            @for($count=1; $count<=5; $count++)
                                                @php
                                                if($count<=$rating->rate){
                                                    $color = 'color:#ffcc00;';
                                                }else{
                                                    $color = 'color:#ccc;';
                                                }
                                                @endphp
                                                <li style="cursor: pointer;{{$color}} font-size: 28px"
                                                >
                                                    &#9733;
                                                </li>
                                            @endfor
                                            </ul>
                                        </div>
                                        <p class="mb-0">
                                            {{$rating->comment}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" style="height: 1px;" />
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <div class="text-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <img class="rounded-circle shadow-1-strong me-3"
                                     src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                                     height="65" />
                                <div class="w-100">
                                    <h5>Add a comment</h5>
                                    <form action="{{route("comments.store",["id" => $item->id])}}" method="post" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="rating">
                                                <label>
                                                    <input type="radio" name="rate" value="1" />
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rate" value="2" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rate" value="3" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rate" value="4" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rate" value="5" />
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                    <span class="icon">★</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-outline">
                                            <textarea name="comment" class="form-control" id="textAreaExample" rows="4" required></textarea>
                                            <label class="form-label" for="textAreaExample">What is your view?</label>
                                        </div>
                                        <div class="form-outline">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button type="submit" class="btn btn-danger">
                                                Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

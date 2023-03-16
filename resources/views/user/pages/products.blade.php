@extends('user.layouts.app')
@section('custom_js')
    <script>
        $('#search').keypress(function(e) {
            if (e.keyCode == 13) {
                console.log("triggered");
                $('#searchForm').submit();
            }
        });
    </script>
@endsection
@section('custom_css')
<style>
    #search{
        
    }
    #search:focus{
        outline: none;
        border: none;
        box-shadow: none;
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
    <div class="page-heading" id="top" style="background-image: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
                <div class="col-lg-4 nav">
                    <form role="form" method="GET" action={{ route('user_product-listing') }} id="searchForm"
                        enctype="multipart/form-data">
                        <div class="search scroll-to-section">
                            <input class="form-control" type="text" placeholder="Search" id="search" name="key" value="{{$key? $key : null}}"> 
                            <button type="submit" style="border: none"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{route("user_product-single",["id" => $item->id])}}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{route("user_product-single",["id" => $item->id])}}"><i class="fa fa-star"></i></a></li>
                                        <li><a href="{{route("user_product-single",["id" => $item->id])}}"><i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img width="100%" src="{{ $item->thumbnail }}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{ $item->title }}</h4>
                                <span>VND {{ number_format($item->price, 0) }}</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                        {!!$data->appends(Request::except('page'))->links() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection

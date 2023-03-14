@extends("user.layouts.app")

@section('content')
<!-- ***** Header Area Start ***** -->
{{-- @include('user.layouts.navbars.guest.topnav') --}}
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Result for Products</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($products as $item)
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="{{route("user_product-single")}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="{{route("user_product-single")}}"><i class="fa fa-star"></i></a></li>

                                <li >
                                    <a href="#"
                                    data-url="{{route('add_to_cart', ['id' => $item->id])}}"
                                    class="add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <img width="100%" src="{{$item->thumbnail}}" alt="">
                    </div>
                    <div class="down-content">
                        <h4>{{$item->title}}</h4>
                        <span>${{number_format($item->price)}}</span>
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

            <!-- <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">></a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- ***** Products Area Ends ***** -->
<script>
    
</script>
@endsection
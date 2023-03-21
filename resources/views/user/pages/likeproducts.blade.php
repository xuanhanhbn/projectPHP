@extends('user.layouts.app')
@section('custom_css')
<style>
    .shoping__cart__item a{
        color: #000;
    }
    .shoping__cart__item a:hover{
        opacity: 0.5;
        text-decoration: underline;
    }

</style>
@endsection
@section("content")
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->




<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Liked Products</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Product</th>
                                <th>Price</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $likeProducts as $item)
                            <tr class="like-prd">
                                <td class="shoping__cart__item">
                                    <img class="liked" src="{{$item ->Product-> thumbnail}}" alt="" width="75" height="75">
                                    <a href="{{route("user_product-single",["id" => $item->Product->id])}}">{{$item->Product->title}}</a>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ number_format($item->Product->price, 0) }}
                                </td>

                                <td class="shoping__cart__item__close">
                                    <i class="fa-solid fa-heart liked-icon"></i>
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
                            <a href="{{route('user_product-listing')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            
                    </div>
        </div>
    </div>
</section>
@endsection
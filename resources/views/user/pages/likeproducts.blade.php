@extends('user.layouts.app')
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
                                <th class="shoping__product">Image</th>
                                <th>Products</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="like-prd">
                                <td class="shoping__cart__item">
                                    <img class="liked" src="assets/images/instagram-01.jpg" alt="">
                                </td>
                                <td class="shoping__cart__price">
                                    sad
                                </td>

                                <td class="shoping__cart__item__close">
                                    <i class="fa-solid fa-heart liked-icon"></i>
                                </td>
                            </tr>


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
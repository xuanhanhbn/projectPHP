@extends("user.layouts.app")

@section('content')
<section class="hero hero-normal" >
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
    <div style="display: flex; flex-direction: column;align-items: center;">
        <h3 style="margin-top: 40px;">YOU HAVEN'T ORDERED ANY PRODUCTS YET!</h3>
        <span>Please choose for yourself the 1 best product 🙂</span>
        <div class="col-lg-12" style="width: 250px;margin-top: 40px;">
            <div class="shoping__cart__btns">
                <a href="{{route('user_product-listing')}}" class="primary-btn cart-btn">SHOPPING NOW</a>
            </div>
    </div>
</section>
@endsection
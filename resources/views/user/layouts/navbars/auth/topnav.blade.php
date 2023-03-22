    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route("user_home")}}" class="logo">
                            <img src="user/assets/images/arts-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{route("user_about")}}">About Us</a></li>
                            <li><a href="{{route("user_product-listing")}}">Our Products</a></li>
                            <li><a href="{{route("user_contact")}}">Contact Us</a></li>
                            <li class="submenu">
                                <a href="javascript:;"><i class="fa-solid fa-user fa-xl"></i> {{Auth::user()->lastname}}</a>
                                <ul>
                                    <li><a href="{{route("user_cart")}}"><i class="fa-solid fa-cart-shopping fa-xm"></i> Shopping Cart</a></li>
                                    <li><a href="{{route('liked-product')}}"><i class="fa fa-heart"></i> Liked Products</a></li>
                                    <li><a href="{{route('user_order-listing')}}"><i class="fa-solid fa-receipt"></i> My Orders</a></li>
                                    {{-- <li><a href="#"><i class="fa-solid fa-user fa-xm"></i> Profile</a></li> --}}
                                    <li>
                                        <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out fa-xm"></i> Log out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
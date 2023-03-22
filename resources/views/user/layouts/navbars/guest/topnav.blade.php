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
                        <a href="{{ route('user_home') }}" class="logo">
                            <img src="user/assets/images/arts-logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ route('user_about') }}">About Us</a></li>
                            <li><a href="{{ route('user_product-listing') }}">Products</a></li>
                            <li><a href="{{ route('user_contact') }}">Contact Us</a></li>
                            <li class="submenu">
                                <a href="javascript:;"><i class="fa-solid fa-user fa-xl"></i> Login/ Register</a>
                                <ul>
                                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"
                                                aria-hidden="true"></i> Register</a></li>
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

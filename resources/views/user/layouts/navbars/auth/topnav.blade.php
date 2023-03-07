<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route("user_home")}}" class="logo">
                        <img src="user/assets/images/logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route("user_product-listing")}}">Our Products</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Explore</a>
                            <ul>
                                <li><a href="{{route("user_about")}}">About Us</a></li>
                                <li><a href="{{route("user_contact")}}">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:;"><i class="fa fa-user" aria-hidden="true" style="text-transform: capitalize"></i> {{strtolower(Auth::user()->lastname)}}</a>
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li> 
                                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            Log out
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Arts Shop</title>


    <!-- styels -->
    @include('user.pages.layout.css')
    @yield('custom_css')

<body>

    @guest
    @include('user.layouts.navbars.guest.topnav')
    @endguest

    @auth
    @include('user.layouts.navbars.auth.topnav')
    @endauth

    @yield('content')
    <!-- /container -->

    <!-- footer -->
    @include('user.pages.layout.footer')
    <!-- /footer -->

    <!-- script -->
    @include('user.pages.layout.js')
    @yield('custom_js')
    <!-- jQuery -->
</body>

</html>
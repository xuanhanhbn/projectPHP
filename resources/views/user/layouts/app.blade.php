<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Arts Shop</title>
    <base href="/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- styels -->
    @include('user.assets.css')
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
    @include('user.layouts.footers.footer')
    <!-- /footer -->

    <!-- script -->
    @include('user.assets.js')
    @yield('custom_js')
    <!-- jQuery -->
</body>

</html>

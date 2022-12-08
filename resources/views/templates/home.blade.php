@php
    $objUser = \App\Models\Category::all();
    $banner = \App\Models\Imgbanner::all();
@endphp
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Namdt - mobile-phone eCommerce </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

<!--Offcanvas menu area start-->

<!--header area start-->
<header>
    @include('templates.header')
</header>
<!--home section bg area start-->
<div class="home_section_bg">

@yield('content')


</div>
<!--home section bg area end-->

<!--footer area start-->
@include('templates.footer')
<!--footer area end-->




<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{asset('js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>



</body>


<!-- Mirrored from htmldemo.net/antomi/antomi/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Nov 2022 11:02:46 GMT -->
</html>

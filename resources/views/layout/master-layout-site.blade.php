<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/plyr.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/FrontEnd/css/style.css')}}" type="text/css">
    @yield('link_css')
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    @include('FrontEnd.block.header')
    <!-- Header End -->

    <!-- Hero Section Begin -->
    
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    @yield('main_content')
<!-- Product Section End -->

<!-- Footer Section Begin -->
    @include('FrontEnd.block.footer')
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  @include('FrontEnd.block.search')
<!-- Search model end -->

<!-- Js Plugins -->
<script src="{{asset('public/FrontEnd/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/player.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/FrontEnd/js/main.js')}}"></script>
@yield('link_js')


</body>

</html>
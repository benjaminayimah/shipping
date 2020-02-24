<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149267553-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-149267553-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AF Logistics, Mining & Petroleum Company Limited is a leading forwarding and International logistic company based in Ghana. With our of experience in handling logistics, safekeeping and mining services. We at AF Logistics believe in integrity, professionalism and in providing a comprehensive Freight solution tailor-made to suit our customers.">
    <meta name="keywords" content="sea freight,air freight,cargo,Holdings,AF logistics, mining & petroleum company limited,mining,petroleum,gold,minerals,diamond,af logistics co., ltd,world-wide transport,door-to-door,petroleum,shipping,port,freight forwarding,consultancy,consumables,cocoa,fruits,hotel food supply,import,export,import-export,import services,export services,AF Ltd., logistics">
    <meta name="application-name" content="AF Logistics, Mining & Petroleum Co., Ltd.">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('images/svg/favicon.svg') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
    <link href="{{ URL::to('vendor/material-design-iconic-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
@endauth
@include('includes.alerts')
@yield('body')
<script src="{{ URL::to('js/jquery.js') }}"></script>
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('js/jquery.stellar.min.js') }}"></script>
<script src="{{ URL::to('js/wow.min.js') }}"></script>
<script src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::to('js/smoothscroll.js') }}"></script>
<script src="{{ URL::to('js/custom.js') }}"></script>
<script src="{{ URL::to('js/main.js') }}"></script>
@include('cookieConsent::index')
</body>
</html>

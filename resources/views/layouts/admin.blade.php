<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ URL::to('images/svg/favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ URL::to('vendor/material-design-iconic-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/dash/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/dash/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ URL::to('/dash/css/argon.css?v=1.0.0') }}" rel="stylesheet">
    <link type="text/css" href="{{ URL::to('dash/css/dash-main.css') }}" rel="stylesheet">
</head>
<body class="sidebar-unpinned">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=236143977144756&autoLogAppEvents=1"></script>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
@include('includes.alerts')
@include('admin.includes.side-nav')
<div class="main-content" id="main_content">
    @include('admin.includes.top-header')
    <div class="header pb-8 pt-5" style="padding-top: 72px !important;">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">@yield('pageTitle')</h6>
                        <nav class="d-none d-md-inline-block ml-md-4" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                                @yield('titlemain')
                                <li class="breadcrumb-item active" aria-current="page">@yield('pageTitle')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        @yield('new-btn')
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
                @yield('first-card')
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        @yield('second-card')
        @yield('third-card')
        @include('admin.includes.footer')
    </div>
</div>
<script>window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };
        return t;
    }(document, "script", "twitter-wjs"));</script>
@include('admin.includes.js-routes')
<script src="{{ URL::to('/dash/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::to('dash/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ URL::to('dash/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<script src="{{ URL::to('dash/js/dash-main.js') }}"></script>
<script src="{{ URL::to('/dash/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::to('/dash/js/argon.js?v=1.0.0') }}"></script>
<script type="text/javascript" src="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.js') }}"></script>
</body>
</html>

@extends('layouts.master')

@section('body')
    @include('includes.header')
    <style>
        .slider .item{ height: 340px !important;}
    </style>
    <link href="{{ URL::to('css/alt-css.css') }}" rel="stylesheet">
    <section id="home" class="slider" style="position:relative;">
        <div>
            <div class="owl-carousel owl-theme">
                <!-- banner 6 -->
                <div class="item item-gallery" data-stellar-background-ratio="0.5">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-8 col-sm-12 slider-caption-main">
                                <h1>@yield('secondary-title')</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('secondary-body')
    @include('includes.footer')
@stop

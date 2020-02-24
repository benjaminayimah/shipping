@extends('layouts.master')
@section('title')
    AF Logistics - Login
@stop
@section('body')
    <link href="{{ URL::to('css/alt-css.css') }}" rel="stylesheet">
    @include('includes.header')
    <section data-stellar-background-ratio="0.5" style="background-image: url('{{ URL::to('images/custom2.jpg') }}');background-position: inherit;
        background-repeat: no-repeat;
        background-attachment: local;
        background-size: cover;
        min-height: 650px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="section-title wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 30px">Login</h3>
                    <div class="log-form-holder">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form role="form" method="post" action="{{ route('post.login') }}" id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password">
                                </div>
                                <div class="form-group">
                                    <input  name="rememberMe" id="customCheckLogin" type="checkbox">
                                    <label for="customCheckLogin">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a href="javascript: void (0)" class="btn submit-btn section-btn btn-blue-gd" data-spin="signin_spin" data-target="loginForm">LOG IN <div id="signin_spin" class="lazy-loader-sm"></div></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
    </section>

    @include('includes.footer')
@stop

@extends('layouts.master')
@section('title')
    AF Logistics - Track your shipment!
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
                        <div>
                            <h3 class="section-title wow fadeInUp" data-wow-delay="0.2s">Track your shipment.</h3>
                            <div class="wow fadeInUp" data-wow-delay="0.4s">Provide your Email & Tracking/Shipment ID.</div>
                            <div class="log-form-holder">
                                <div class="wow fadeInUp" data-wow-delay="0.5s">
                                    <form role="form" method="post" action="{{ route('post.tracker') }}" id="loginForm">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" name="email" placeholder="Email" type="email">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="trackingId" placeholder="Tracking ID" type="text">
                                        </div>
                                        <div class="form-group">
                                            <a href="javascript: void (0)" class="btn submit-btn section-btn btn-blue-gd" data-spin="track_spin" data-target="loginForm">SUBMIT <div id="track_spin" class="lazy-loader-sm"></div></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-sm-6"></div>
            </div>

        </div>
    </section>
    @include('includes.footer')
@stop

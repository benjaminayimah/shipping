@extends('layouts.master')
@section('title')
    AF Logistics - Help & Support
@stop
@section('body')
    <link href="{{ URL::to('css/alt-css.css') }}" rel="stylesheet">
    @include('includes.header')
    <section data-stellar-background-ratio="0.5" style="background-image: url('{{ URL::to('images/custom1.jpg') }}');background-position: inherit;
        background-repeat: no-repeat;
        background-attachment: local;
        background-size: cover;
        min-height: 650px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="section-title wow fadeInUp" data-wow-delay="0.2s">Help & Support.</h3>
                    <h4 class="text-primary wow fadeInUp" data-wow-delay="0.2s"><strong>Contact Us</strong></h4>
                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                    If you have any questions, feed back or complains, please reach out to us on our social media handles belows. Our team
                    of professional will be glad to offer their support.
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                        <li><a target="_blank" title="Facebook-aflogistics" href="https://facebook.com/102543527821470" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a target="_blank" title="Twitter-aflogistics" href="https://twitter.com/aflogistics_gh" class="fa fa-twitter"></a></li>
                        <li><a target="_blank" title="Instagram-aflogistics" href="https://instagram.com/aflogistics_gh" class="fa fa-instagram"></a></li>
                        <li><a target="_blank" title="Messenger-aflogistics" href="https://m.me/102543527821470" class="fa fa-comment"></a></li>
                    </ul>
                    </p>
                    <p class="wow fadeInUp" data-wow-delay="0.6s">
                        You can also send us a direct message from our contact form <a href="#footer" class="smoothScroll text-danger">write here.</a>
                    </p>
                </div>
                <div class="col-sm-6"></div>
            </div>

        </div>
    </section>
    @include('includes.footer')
@stop

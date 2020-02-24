@extends('layouts.master')
@section('title')
    404 - Page Not Found
@stop
@section('body')
    <link href="{{ URL::to('css/alt-css.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/error-page.css') }}" rel="stylesheet">
    @include('includes.header')
    <section>
        <div class="container" style="margin-top: 50px">
            <h3>The page you're looking for does not exist</h3>
        </div>
    </section>
    <footer id="footer" data-stellar-background-ratio="0.5" >
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-info wow fadeInUp"  data-wow-delay="0.2s">
                        <div><img style="height: 70px" src="{{ URL::to('images/svg/aflogo-white.svg') }}" alt="AF Logistics" /></div>
                        <address class="wow fadeInUp mt-5" data-wow-delay="0.4s">
                            <p class="pb-3">We are located on the No. 7 Lagoon street, Bantama, Kumasi - Ghana.</p>
                        </address>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="footer-info">
                        <div class="section-title">
                            <h4 class="wow fadeInUp text-white mt-4" data-wow-delay="0.2s">Contact us</h4>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>+233(0) 30 295 7756<br>+233(0) 30 295 7757</p>
                            <p><a href="mailto:info@jrmsholdings.com">info@aflogisticsandmining.com</a></p>
                        </address>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-info">
                        <div class="section-title">
                            <h4 class="wow fadeInUp text-white mt-4" data-wow-delay="0.6s">Quick links</h4>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.8s">
                            <small><a href="{{ route('get.quote') }}"><i class="zmdi zmdi-chevron-right"></i> Get a free Quote</a></small>
                            <br>
                            <small><a href="{{ route('get.tracking') }}"><i class="zmdi zmdi-chevron-right"></i> Track your Shipment</a></small>
                            <br>
                            <small><a href="{{ route('get.help') }}"><i class="zmdi zmdi-chevron-right"></i> Help & Support</a></small>
                        </address>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="section-title">
                        <h4 class="wow fadeInUp text-white mt-4" data-wow-delay="0.2s">Connect with us</h4>
                    </div>
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                        <li><a target="_blank" title="Facebook-aflogistics" href="https://www.facebook.com/102543527821470" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a target="_blank" title="Twitter-aflogistics" href="https://twitter.com/aflogistics_gh" class="fa fa-twitter"></a></li>
                        <li><a target="_blank" title="Instagram-aflogistics" href="https://instagram.com/aflogistics_gh" class="fa fa-instagram"></a></li>
                        <li><a target="_blank" title="Messenger-aflogistics" href="https://m.me/102543527821470" class="fa fa-comment"></a></li>
                    </ul>

                    <div class="wow fadeInUp copyright-text" data-wow-delay="0.6s">
                        <p><br>
                            <small><a href="{{ route('get.terms') }}">Terms & Conditions</a></small>
                            <br>
                            <small><a href="{{ route('get.privacy') }}">Privacy Policy</a></small>
                        <hr>
                        <small class="light-gray">Copyright © 2019 AF Logistics, Mining & Petroleum Co. Limited</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@stop

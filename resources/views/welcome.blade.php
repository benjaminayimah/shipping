@extends('layouts.master')
@section('title')
    AF Logistics, Mining & Petroleum Co., Limited - Home
@stop
@section('body')
    @include('includes.header')
    @include('includes.banner')
    <section id="services"  style="padding: 60px 0 70px 0;background-color: rgb(244, 245, 247);background-image: url('{{ URL::to('images/svg/project.svg') }}'); background-repeat: no-repeat;  background-size: 400px; background-position: 50% 135%">
        <div class="container">
            <div class="wow fadeInDown section-title-hold" data-wow-delay="0.2s">
                @if ($serviceHead)
                    <p><h3 class="section-title">{{ $serviceHead->title }}</h3></p>
                    <p class="title-sub">{{ $serviceHead->sub_title1 }}<br/>{{ $serviceHead->sub_title2 }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-4 wow fadeInLeft" data-wow-delay="0.4s">
                    @if (count($servicesLeft) > 0)
                        <ul class="services-pills">
                            @foreach ($servicesLeft as $service)
                                <li>
                                    <a href="javascript: void (0)">
                                        <div class="pills-wrap">
                                            <div class="services-pills-left">
                                                <div class="pill-icon-hold"><i class="{{ $service->icon }}"></i></div>
                                            </div>
                                            <div class="services-pills-right">
                                                <div class="pills-text">{{ $service->btn }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4 wow fadeInRight" data-wow-delay="0.6s">
                    @if (count($servicesRight) > 0)
                    <ul class="services-pills">
                        @foreach ($servicesRight as $service)
                        <li>
                            <a href="javascript: void (0)">
                                <div class="pills-wrap">
                                    <div class="services-pills-left">
                                        <div class="pill-icon-hold"><i class="{{ $service->icon }}"></i></div>
                                    </div>
                                    <div class="services-pills-right">
                                        <div class="pills-text">{{ $service->btn }}</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="about" style="padding: 70px 0">
        <div class="container">
            <div class="wow bounceIn section-title-hold" data-wow-delay="0.2s">
                @if ($aboutHead)
                    <p><h3 class="section-title">{{ $aboutHead->title }}</h3></p>
                    <p class="title-sub">{{ $aboutHead->sub_title1 }}<br />{{ $aboutHead->sub_title2 }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="about-to-left">
                        <div class="tab-content">
                            @if ($WhoWeAre)
                                <div class="tab-pane fade active in" id="who_we_are">
                                    <h2 class="mt-0">{{ $WhoWeAre->title }}</h2>
                                    <p>{{ $WhoWeAre->body }}</p>
                                </div>
                            @endif
                            @if ($vision)
                                    <div class="tab-pane fade" id="vision">
                                        <h2 class="mt-0">{{ $vision->title }}</h2>
                                        <p>{{ $vision->body }}</p>
                                    </div>
                                @endif
                                @if ($mission)
                                    <div class="tab-pane fade" id="mission">
                                        <h2 class="mt-0">{{ $mission->title }}</h2>
                                        <p>{{ $mission->body }}</p>
                                        @if ($coreValues)
                                            <p class="text-dark mb-0">Core values:</p>
                                            <ul>
                                                @foreach($coreValues as $values)
                                                    <li>{{ $values->title }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif

                        </div>
                    </div>
                    <div id="abt_card" style="width: 100%; display: table; clear: both">
                        <ul class="nav nav-pills">
                            <li class="active pl-0 li">
                                <a data-toggle="pill" href="#who_we_are" class="abt-card">
                                    <div class="abt-card-main">
                                        <div class="abt-card-hd"><div class="abt-card-ih"><i class="zmdi zmdi-airplane"></i></div></div>
                                        <div class="abt-card-ft"><span>Who we are</span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="li">
                                <a data-toggle="pill" href="#vision" class="abt-card">
                                    <div class="abt-card-main">
                                        <div class="abt-card-hd"><div class="abt-card-ih"><i class="zmdi zmdi-lamp"></i></div></div>
                                        <div class="abt-card-ft"><span>Vision</span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="pr-0 li">
                                <a data-toggle="pill" href="#mission" class="abt-card">
                                    <div class="abt-card-main">
                                        <div class="abt-card-hd"><div class="abt-card-ih"><i class="zmdi zmdi-star"></i></div></div>
                                        <div class="abt-card-ft"><span>Mission</span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="wow fadeInUp " data-wow-delay="0.6s">
                        <div class="owl-carousel owl-theme" id="about_carousel" style="position: relative">
                            @if ($aboutImg)
                                @foreach($aboutImg as $img)
                                    <div class="item active">
                                        <img src="{{ asset('storage/'.$img->image) }}" class="img-fluid rounded" alt="{{ $img->title }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id=""  style="padding: 70px 0; background-color: rgb(244, 245, 247)" >
        <div class="container">
            <div class="wow fadeInDown section-title-hold" data-wow-delay="0.2s" style="margin-bottom: 25px">
                @if ($whychooseHead)
                    <p><h3 class="section-title">{{ $whychooseHead->title }}</h3></p>
                @endif
            </div>
                <ul class="nav nav-pills wow bounceIn" id="nav_pill_ul" data-wow-delay="0.2s">
                    <li id="pill_1"><a  data-toggle="pill" href="#why_us1"><span><small>Proven</small></span><br /><span><small>Track Pecord</small></span></a></li>
                    <li id="pill_2" class="active"><a data-toggle="pill" href="#why_us2"><span><small>Experienced</small></span><br /><span><small>Professionals</small></span></a></li>
                    <li id="pill_3"><a data-toggle="pill" href="#why_us3"><span><small>Competitive</small></span><br /><span><small>Pricing</small></span></a></li>
                </ul>
            <div class="tab-content wow fadeInUp" data-wow-delay="0.4s" >
                @if ($WhyChooseBody)
                    @foreach($WhyChooseBody as $wychoose)
                        @if ($wychoose->title == 1)
                            <div id="why_us1" class="tab-pane fade row">
                                <div class="col-sm-6">
                                    <div>
                                        <img src="{{ asset('storage/'.$wychoose->image) }}" class="img-fluid rounded shadow-lg" alt="AF Logistics - why choose us image 1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="about-to-right">
                                        <div>
                                            <p>{{ $wychoose->body }}</p>
                                        </div>
                                        <a href="{{ $wychoose->btn_target }}" class="section-btn btn-blue-gd btn">{{ $wychoose->btn }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($wychoose->title == 2)
                                <div id="why_us2" class="tab-pane active in fade row">
                                    <div class="col-sm-6">
                                        <div>
                                            <img src="{{ asset('storage/'.$wychoose->image) }}" class="img-fluid rounded shadow-lg" alt="AF Logistics - why choose us image 2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="about-to-right">
                                            <div>
                                                <p>{{ $wychoose->body }}</p>
                                            </div>
                                            <a href="{{ $wychoose->btn_target }}" class="section-btn btn-blue-gd btn">{{ $wychoose->btn }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($wychoose->title == 3)
                                <div id="why_us3" class="tab-pane fade row">
                                    <div class="col-sm-6">
                                        <div>
                                            <img src="{{ asset('storage/'.$wychoose->image) }}" class="img-fluid rounded shadow-lg" alt="AF Logistics - why choose us image 3">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="about-to-right">
                                            <div>
                                                <p>{{ $wychoose->body }}</p>
                                                <p></p>
                                            </div>
                                            <a href="{{ $wychoose->btn_target }}" class="section-btn btn-blue-gd btn">{{ $wychoose->btn }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <section id="" class="section section-shaped" style="padding: 40px 0; ">
        <div id="ww_icons" class="shape shape-style-1 shape-default" style="border-bottom: 1px #fff solid; background: #004bbf">
            <span></span>
            <span style="display: none"></span>
            <span style="display: none"></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style="padding: 5% 15px">
                    <table id="ww_portfolio">
                        <tbody class="wow bounceIn" data-wow-delay="0.4s" >
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <span class="counter" data-count="32"></span>
                                    <span>Countries<br />Covered</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="counter" data-count="2596"></span>
                                    <span>Satisfied<br />Clients</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <span class="counter" data-count="4"></span>
                                    <span>Offices<br />Worldwide</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="counter" data-count="100"></span><span>%</span>
                                    <span>Professional<br />Approach</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <div class="wow fadeInUp" data-wow-delay="0.6s">
                        <img src="{{ URL::to('images/locationss2.jpg') }}" class="img-responsive" alt="AF Logistics Holdings Limited coverage map">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="gallery" data-stellar-background-ratio="0.5" style="padding: 70px 0">
        <div class="container">
            <div class="wow swing section-title-hold" data-wow-delay="0.2s">
                @if ($galleryHead)
                    <p><h3 class="section-title">{{ $galleryHead->title }}</h3></p>
                    <p class="title-sub">{{ $galleryHead->sub_title1 }}</p>
                @endif
            </div>
            <div class="row wow bounceIn" data-wow-delay="0.4s">
                @if (count($gallery) > 0)
                    @foreach($gallery as $gal)
                        <div class="col-sm-3 pb-0">
                            <div class="menu-thumb">
                                <a href="{{ asset('storage/'.$gal->image) }}" class="image-popup" title="{{ $gal->caption }} - {{ $gal->sub_caption1 }}">
                                    <img src="{{ asset('storage/'.$gal->image) }}" class="img-responsive" alt="{{ $gal->caption }}">
                                    <div class="menu-info">
                                        <div class="menu-item">
                                            <h3>{{ $gal->caption }}</h3>
                                            <p>{{ $gal->sub_caption1 }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    No image found
                @endif
            </div>
            <div class="section-more-hold wow fadeInUp" data-wow-delay="0.4s">
                <a href="{{ route('get.gallery') }}" class="section-btn btn-blue-gd section-more">SEE MORE <i class="zmdi zmdi-chevron-right"><i class="zmdi zmdi-chevron-right"></i></i></a>
            </div>
        </div>
    </section>
    <section class="section section-shaped"  style="padding: 80px 0">
        <div class="shape shape-style-1 " style="border-bottom: 1px #fff solid; background-image: linear-gradient(to right bottom, #192cee, #502fd3, #6435bb, #6c3da3, #6e458e);">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div>
                <div id="newsletter_hold">
                    <div class="wow bounceIn" data-wow-delay="0.2s">
                        <h6 style="font-size: 18px; color: #fff">SUBSCRIBE TO OUR NEWSLETTER</h6>
                    </div>
                    <p class="wow bounceIn" data-wow-delay="0.4s" style="color: #fff; margin-bottom: 15px">
                        Learn about new offers and get more deals by subscribing to our newsletter
                    </p>
                    <form method="post" action="{{ route('post.newsletter') }}" id="newsletter_form" class="wow fadeInUp" data-wow-delay="0.6s">
                        @csrf
                        <div class="form-group">
                            <div class="input-group" id="newsletter_input_group">
                                <input class="form-control newsletter-input" name="email" placeholder="Enter your email">
                                <div class="input-group-prepend">
                                    <a href="javascript: void (0)" data-target="newsletter_form" data-spin="newsletter_spin" class="btn submit-btn newsletter-btn">SUBMIT <div id="newsletter_spin" class="lazy-loader-sm"></div></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="mapouter wow bounceIn" data-wow-delay="0.2s">
        <div class="gmap_canvas"><iframe width="100%" height="417" id="gmap_canvas" src="https://maps.google.com/maps?q=5%C2%B033'43.6%22N%200%C2%B017'45.4%22W&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
    </div>
   @include('includes.footer')
@stop

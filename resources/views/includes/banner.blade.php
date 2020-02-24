<section id="home" class="slider" style="position:relative;">
    <a href="#services" class="scroll-to-next floating"><i class="zmdi zmdi-long-arrow-down"></i></a>
    <div>
        <div class="owl-carousel owl-theme">
            <!-- banner 1 -->
            @if (count($banner) > 0)
                @foreach($banner as $ban)
                    <div class="item" data-stellar-background-ratio="0.5" style="background-image: url('{{ URL::to('storage/'.$ban->image) }}')">
                        <div class="caption">
                            <div class="container">
                                <div class="col-md-7 col-sm-12 slider-caption-main">
                                    <h3 class="text-gray">{{ $ban->caption }}</h3>
                                    <h1>{{ $ban->sub_caption1 }}</h1>
                                    <a href="{{ $ban->btn_target }}" class="section-btn banner-btn btn bg-white smoothScroll">{{ $ban->btn }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="item banner-default" data-stellar-background-ratio="0.5">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-7 col-sm-12 slider-caption-main">
                                <h3 class="text-gray">Welcome to AF Logistics, Mining & Petroleum Co., Ltd</h3>
                                <h1>We are a leading forwarding, and International logistic company based in Ghana.</h1>
                                <a href="#services" class="section-btn btn bg-white smoothScroll">OUR SERVICES</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!--
            <div class="item item-second" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-7 col-sm-12 slider-caption-main">
                            <h3 class="text-red">We bet on food quality</h3>
                            <h1>We import the very best of food produce from around the world.</h1>
                            <a href="{{ route('get.quote') }}" class="section-btn btn smoothScroll">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-third" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-7 col-sm-12 slider-caption-main">
                            <h3 class="text-red">We bet on food quality</h3>
                            <h1>We import the very best of food produce from around the world.</h1>
                            <a href="#about" class="section-btn btn smoothScroll">ABOUT US</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-fourth" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-7 col-sm-12 slider-caption-main">
                            <h3 class="text-orange">We bet on food quality</h3>
                            <h1>We import the very best of food produce from around the world.</h1>
                            <a href="{{ route('get.quote') }}" class="section-btn bg-white btn smoothScroll">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-fifth" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-7 col-sm-12 slider-caption-main">
                            <h3 class="text-blue">We bet on food quality</h3>
                            <h1>We import the very best of food produce from around the world.</h1>
                            <a href="#footer" class="section-btn btn-blue-gd btn smoothScroll">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--
            <div class="item item-first section-shaped" data-stellar-background-ratio="0.5" style="position: relative">
                <div class="shape shape-style-1 shape-primary3">
                    <span class="span-150"></span>
                    <span class="span-50"></span>
                    <span class="span-50"></span>
                    <span class="span-75"></span>
                    <span class="span-100"></span>
                    <span class="span-75"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                </div>
                <div class="caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 slider-caption-main">
                                <h3 style="color: #00ecf0">Import &amp; Export</h3>
                                <h1>Our mission is to provide an unforgettable experience</h1>
                                <a href="#services" class="section-btn btn smoothScroll">OUR SERVICES</a>
                            </div>
                            <div class="col-sm-4 slider-img-col alt-col" >
                                <div class="slider-img-main"  style="background: url('{{ URL::to('images/svg/take-off.svg') }}')  no-repeat; background-size: cover; width: auto;  height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-second" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 slider-caption-main">
                            <h3 class="text-red">We bet on food quality</h3>
                            <h1>We import the very best of food produce from around the world.</h1>
                            <a href="{{ route('get.quote') }}" class="section-btn btn smoothScroll">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-first section-shaped" data-stellar-background-ratio="0.5" style="position: relative;">
                <div class="shape shape-style-1" style="background: linear-gradient(to right bottom, #ff0000, #e06200, #b48b00, #7ba700, #00bb00);">
                    <span class="span-150"></span>
                    <span class="span-50"></span>
                    <span class="span-50"></span>
                    <span class="span-75"></span>
                    <span class="span-100"></span>
                    <span class="span-75"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                </div>
                <div class="caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 slider-caption-main">
                                <h3 class="text-darker">Products from rich african markets</h3>
                                <h1>Benefit form our in-depth knowledge of quality range of products from Africa.</h1>
                                <a href="#about" class="section-btn bg-black btn smoothScroll">ABOUT US</a>
                            </div>
                            <div class="col-sm-4 slider-img-col alt-col" >
                                <div class="slider-img-main" style=" background: url('{{ URL::to('images/why_chooseuj.jpg') }}')  no-repeat; background-size: cover; width: auto; border-radius: 50%; border: 4px solid #fff; height: 350px; "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-fourth" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 slider-caption-main">
                            <h3 class="text-red">Hotel & catering services</h3>
                            <h1>We supply all your catering service needs</h1>
                            <a href="{{ route('get.quote') }}" class="section-btn btn-blue-gd btn smoothScroll">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-first section-shaped" data-stellar-background-ratio="0.5" style="position: relative;">
                <div class="shape shape-style-1 shape-primary2">
                    <span class="span-150"></span>
                    <span class="span-50"></span>
                    <span class="span-50"></span>
                    <span class="span-75"></span>
                    <span class="span-100"></span>
                    <span class="span-75"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                    <span class="span-50"></span>
                    <span class="span-100"></span>
                </div>
                <div class="caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 slider-caption-main">
                                <h3 class="text-blue">we're diverse</h3>
                                <h1>We're present in Canada, Europe and Africa.</h1>
                                <a href="#footer" class="section-btn btn-blue-gd btn smoothScroll">CONTACT US</a>
                            </div>
                            <div class="col-sm-4 slider-img-col alt-col" >
                                <div class="slider-img-main" style=" background: url('{{ URL::to('images/svg/landmark.svg') }}') center center no-repeat; background-size: cover ; width: auto;height: 350px; "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            -->

            <!-- banner 6 -->
            <!--<div class="item item-third" data-stellar-background-ratio="0.5">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 slider-caption-main">
                            <h3 class="text-red">Hotel & catering services</h3>
                            <h1>We supply all your catering service needs</h1>
                            <a href="#contact" class="section-btn btn-blue-gd btn smoothScroll">GET A QUOTE</a>
                        </div>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
</section>

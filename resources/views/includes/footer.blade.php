<footer id="footer" data-stellar-background-ratio="0.5" >
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-info wow fadeInDown"  data-wow-delay="0.2s">
                    <div><img style="height: 70px" src="{{ URL::to('images/svg/aflogo-white.svg') }}" alt="AF Logistics" /></div>
                    <?php
                    $address =  \App\Home::all()->where('type', 'Address')->first();
                    $phone = \App\Home::all()->where('type', 'Phone');
                    $email = \App\Home::all()->where('type', 'email')->first();
                    $quickLinks = \App\Home::all()->where('type', 'QuickLinks');
                    ?>
                    @if ($address)
                        <address class="wow fadeInDown mt-2 mb-2" data-wow-delay="0.3s">
                            <p class="pb-3">{{ $address->body }}</p>
                        </address>
                    @endif
                    <div class="mapouter footermap wow fadeInDown" style="height: 150px; padding: 0" data-wow-delay="0.4s">
                        <div class="gmap_canvas" style="height: 150px"><iframe width="100%" height="150" id="gmap_canvas" src="https://maps.google.com/maps?q=5%C2%B033'43.6%22N%200%C2%B017'45.4%22W&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-info">
                    <div class="section-title">
                        <h4 class="wow fadeInDown text-white mt-4" data-wow-delay="0.2s">Contact us</h4>
                    </div>
                    <address class="wow fadeInDown" data-wow-delay="0.4s">
                        @if ($phone)
                            <p>
                                @foreach($phone as $phones)
                                    {{ $phones->body }}<br>
                                @endforeach
                            </p>
                        @endif
                        @if ($email)
                                <p><a href="mailto:{{ $email->body }}">{{ $email->body }}</a></p>
                        @endif
                    </address>
                </div>
                <hr class="footer-separator wow fadeInDown" data-wow-delay="0.6s">
                <div class="footer-info">
                    <div class="section-title">
                        <h4 class="wow fadeInDown text-white mt-4" data-wow-delay="0.6s">Quick links</h4>
                    </div>
                    @if ($quickLinks)
                        <address class="wow fadeInDown" data-wow-delay="0.8s">
                            @foreach($quickLinks as $links)
                                @if ($links->title == 1)
                                    <small><a href="{{ $links->btn_target }}"><i class="zmdi zmdi-chevron-right"></i> {{ $links->body }}</a></small>
                                    <br>
                                @endif
                            @endforeach
                        </address>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="section-title">
                    <h4 class="wow fadeInDown text-white mt-4" data-wow-delay="0.2s">Get in touch</h4>
                </div>
                <form method="post" action="{{ route('post.feedback') }}" id="footer_contact_form">
                    @csrf
                    <div class="form-row wow fadeInDown" data-wow-delay="0.4s">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required>
                        </div>
                    </div>
                    <div class="form-row wow fadeInDown" data-wow-delay="0.6s">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-row wow fadeInDown" data-wow-delay="0.8s">
                        <div class="form-group">
                            <textarea id="message" rows="3" name="message" required class="form-control w-100" placeholder="Type your message"></textarea>
                        </div>
                    </div>
                    <div class="form-row wow fadeInDown" data-wow-delay="1s" style="display: table; clear: both; width: 100%">
                        <a href="javascript: void (0)" data-target="footer_contact_form" style="position: relative" data-spin="contact_spin" class="btn submit-btn section-btn btn-blue-gd pull-right contact-submit">SUBMIT <div id="contact_spin" class="lazy-loader-sm"></div></a>
                    </div>
                </form>
            </div>

            <div class="col-sm-3">
                <div class="section-title">
                    <h4 class="wow fadeInDown text-white mt-4" data-wow-delay="0.2s">Connect with us</h4>
                </div>
                <ul class="wow fadeInDown social-icon" data-wow-delay="0.4s">
                    <li><a target="_blank" title="Facebook-aflogistics" href="https://www.facebook.com/102543527821470" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                    <li><a target="_blank" title="Twitter-aflogistics" href="https://twitter.com/aflogistics_gh" class="fa fa-twitter"></a></li>
                    <li><a target="_blank" title="Instagram-aflogistics" href="https://instagram.com/aflogistics_gh" class="fa fa-instagram"></a></li>
                    <li><a target="_blank" title="Messenger-aflogistics" href="https://m.me/102543527821470" class="fa fa-comment"></a></li>
                </ul>

                <div class="wow fadeInDown copyright-text" data-wow-delay="0.6s">
                    @if ($quickLinks)
                        <p><br>
                            @foreach($quickLinks as $links)
                                @if ($links->title == 2)
                                    <small><a href="{{ $links->btn_target }}">{{ $links->body }}</a></small>
                                    <br>
                                @endif
                            @endforeach
                        </p>
                    @endif
                        <hr>
                        <small class="light-gray">Copyright &copy; 2019 AF Logistics, Mining & Petroleum Co. Limited</small>
                        @if ($quickLinks)
                            <div class="mt-3">
                                @foreach($quickLinks as $links)
                                    @if ($links->title == 3)
                                        <small><span class="light-gray">Designed and Developed by: </span><a href="{{ $links->btn_target }}" class="designed-by">{{ $links->body }}</a></small>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

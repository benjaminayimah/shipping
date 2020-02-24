<header id="header" class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="{{ route('welcome') }}" class="navbar-brand" style="padding: 0 !important; position: relative">
                <img class="img-1" src="{{ URL::to('images/svg/aflogo-white.svg') }}" alt="AF Logistics" />
                <img class="img-2" src="{{ URL::to('images/svg/aflogo.svg') }}" alt="AF Logistics Logo"  />

            </a>
        </div>
        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="{{ Route::is('welcome') ? '#home' : route('welcome') }}" class="smoothScroll">Home</a></li>
                <li><a href="{{ Route::is('welcome') ? '' : route('welcome') }}#services" class="smoothScroll">Services</a></li>
                <li><a href="{{ Route::is('welcome') ? '' : route('welcome') }}#about" class="smoothScroll">About</a></li>
                <li><a href="{{ Route::is('welcome') ? '' : route('welcome') }}#gallery" class="smoothScroll">Gallery</a></li>
                <li><a href="#footer" class="smoothScroll">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">Call Now! <i class="fa fa-phone"></i> 010 020 0340</a></li>-->
                @guest()
                <li><a href="{{ route('get.login') }}">Login</a></li>
                @endguest
                @auth()
                    @if( Auth::user() && Auth::user()->access_level == '1')
                        <li><a class="dropdown-item sgn-in-dropdown" href="{{ route('dashboard') }}"><span> {{ __('Dashboard') }}</span></a></li>
                    @else
                        <li><a href="#!">{{ Auth::user()->name }}</a></li>
                    @endif
                    @endauth
                <li><a href="{{ route('get.tracking') }}" title="Shipment tracker" class="search-btn"><i class="zmdi zmdi-my-location"></i><span class="track-label"> Tracking</span></a></li>
                <a href="{{ route('get.quote') }}" class="section-btn quote-btn bg-white pull-left">GET A QUOTE</a>
            </ul>
        </div>
    </div>
</header>

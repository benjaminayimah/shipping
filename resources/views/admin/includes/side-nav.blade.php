<?php
$quote_noti =  \App\Quote::all()->where('seen', '1')->count();
$feed_noti =  \App\Feedback::all()->where('seen', '1')->count();
?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white sidenav-main" id="sidenav-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div style="height: 40px" class="d-flex">
            <a class="navbar-brand pt-0 m-2" href="{{ route('welcome') }}">
                <img style="height: 60px" src="{{ URL::to('images/svg/aflogo.svg') }}" />
            </a>
            <button class="sidebar-toggle" type="button">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
        </div>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ URL::to('dash/img/theme/avatar-default.png') }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('get.user.account') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#home">
                            <img src="{{ URL::to('dash/img/brand/blue.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav card-collapse" id="mySideNav" role="tablist" aria-multiselectable="true">
                <li class="nav-item {{ Route::is('dashboard') ? 'sidenav-active sidenav-a' : '' }}">
                    <a class="nav-link {{ Route::is('dashboard') ? 'sidenav-a' : '' }}" href="{{ route('dashboard') }}">
                        <i class="ni ni-tv-2 text-primary"></i> <span class="nav-label">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li role="tab" id="shipmentHeading" class="{{ Route::is(['get.shipments', 'get.draft', 'get.addShipment', 'get.adminAwb']) ? 'sidenav-active' : '' }}">
                    <a class="nav-link" href="#shipmentCollapse" data-toggle="collapse" data-parent="#mySideNav" aria-expanded="{{ Route::is(['get.shipments', 'get.draft', 'get.addShipment']) ? 'true' : 'false' }}" aria-controls="shipmentCollapse">
                        <i class="ni ni-delivery-fast text-green"></i> <span class="nav-label">{{ __('Shipments') }}</span>
                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                    </a>
                    <ul id="shipmentCollapse" class="collapse dash-sub-nav {{ Route::is(['get.shipments', 'get.draft', 'get.addShipment', 'get.adminAwb']) ? 'show' : '' }}" role="tabpanel" aria-labelledby="shipmentHeading">
                        <li><a href="{{ route('get.shipments') }}" class="nav-link-child {{ Route::is('get.shipments') ? 'sidenav-a' : '' }}"><span class="nav-label">Published</span><span class="noti noti-nav text-white shadow">{{ \App\Shipment::all()->where('publish_status', '1')->count() }}</span></a></li>
                        <li><a href="{{ route('get.draft') }}" class="nav-link-child {{ Route::is('get.draft') ? 'sidenav-a' : '' }}"><span class="nav-label">Draft</span><span class="noti noti-nav text-white shadow">{{ \App\Shipment::all()->where('publish_status', '0')->count() }}</span></a></li>
                        <li><a href="{{ route('get.adminAwb') }}" class="nav-link-child {{ Route::is('get.adminAwb') ? 'sidenav-a' : '' }}"><span class="nav-label">Airway bill</span></a></li>
                        <li><a href="{{ route('get.addShipment') }}" class="nav-link-child {{ Route::is('get.addShipment') ? 'sidenav-a' : '' }}"><span class="nav-label">Add a new shipment</span></a></li>
                    </ul>
                </li>
                <li role="tab" id="headingTwo" class="{{ Route::is(['get.feedback', 'get.adminQuote']) ? 'sidenav-active' : '' }}">
                    <a class="nav-link" href="#collapseTwo" data-toggle="collapse" data-parent="#mySideNav" aria-expanded="{{ Route::is(['get.feedback', 'get.adminQuote']) ? 'true' : 'false' }}" aria-controls="collapseTwo">
                        <i class="ni ni-email-83 text-red"></i> <span class="nav-label">{{ __('Messages') }}</span>
                        @if ($quote_noti || $feed_noti)
                            <span class="badge badge-pill badge-info text-uppercase">alert</span>
                        @endif
                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                    </a>
                    <ul id="collapseTwo" class="collapse dash-sub-nav {{ Route::is(['get.feedback', 'get.adminQuote']) ? 'show' : '' }}" role="tabpanel" aria-labelledby="headingTwo">
                        <li><a href="{{ route('get.adminQuote') }}" class="nav-link-child {{ Route::is('get.adminQuote') ? 'sidenav-a' : '' }}"><span class="nav-label">Quote requests</span><span class="noti noti-nav text-white shadow">{{ \App\Quote::all()->count() }}</span> @if ($quote_noti)<span class="badge badge-pill badge-info text-uppercase">alert</span>@endif</a></li>
                        <li><a href="{{ route('get.feedback') }}" class="nav-link-child {{ Route::is('get.feedback') ? 'sidenav-a' : '' }}"><span class="nav-label">Feedback</span><span class="noti noti-nav text-white shadow">{{ \App\Feedback::all()->count() }}</span> @if ($feed_noti)<span class="badge badge-pill badge-info text-uppercase">alert</span>@endif</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Route::is('get.user.account') ? 'sidenav-active sidenav-a' : '' }}">
                    <a class="nav-link {{ Route::is('get.user.account') ? 'sidenav-a' : '' }}" href="{{ route('get.user.account') }}">
                        <i class="ni ni-single-02 text-yellow"></i> <span class="nav-label">{{ __('User profile') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('get.userManagement') ? 'sidenav-active sidenav-a' : '' }}">
                    <a class="nav-link {{ Route::is('get.userManagement') ? 'sidenav-a' : '' }}" href="{{ route('get.userManagement') }}">
                        <i class="ni ni-bullet-list-67 text-red"></i> <span class="nav-label">{{ __('User Management') }}</span>
                    </a>
                </li>
                <li role="tab" id="homepageHeading" class="{{ Route::is(['get.adminGallery', 'get.homepage.section1','get.homepage.section2', 'get.homepage.section3', 'get.homepage.sectionFooter', 'get.adminBanner']) ? 'sidenav-active' : '' }}">
                    <a class="nav-link" href="#homepageCollapse" data-toggle="collapse" data-parent="#mySideNav" aria-expanded="{{ Route::is(['get.adminGallery', 'get.homepage.section1', 'get.homepage.section2', 'get.homepage.section3', 'get.homepage.sectionFooter', 'get.adminBanner']) ? 'true' : 'false' }}" aria-controls="homepageCollapse">
                        <i class="ni ni-shop text-blue"></i> <span class="nav-label">{{ __('Home page') }}</span>
                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                    </a>
                    <ul id="homepageCollapse" class="collapse dash-sub-nav {{ Route::is(['get.adminGallery', 'get.homepage.section1', 'get.homepage.section2', 'get.homepage.section3', 'get.homepage.sectionFooter', 'get.adminBanner']) ? 'show' : '' }}" role="tabpanel" aria-labelledby="homepageHeading">
                        <li><a href="{{ route('get.adminBanner') }}" class="nav-link-child {{ Route::is('get.adminBanner') ? 'sidenav-a' : '' }}"><span class="nav-label">Banner section</span></a></li>
                        <li><a href="{{ route('get.adminGallery') }}" class="nav-link-child {{ Route::is('get.adminGallery') ? 'sidenav-a' : '' }}"><span class="nav-label">Home gallery</span></a></li>
                        <li><a href="{{ route('get.homepage.section1') }}" class="nav-link-child {{ Route::is('get.homepage.section1') ? 'sidenav-a' : '' }}"><span class="nav-label">Section 1</span></a></li>
                        <li><a href="{{ route('get.homepage.section2') }}" class="nav-link-child {{ Route::is('get.homepage.section2') ? 'sidenav-a' : '' }}"><span class="nav-label">Section 2</span></a></li>
                        <li><a href="{{ route('get.homepage.section3') }}" class="nav-link-child {{ Route::is('get.homepage.section3') ? 'sidenav-a' : '' }}"><span class="nav-label">Section 3</span></a></li>
                        <li><a href="{{ route('get.homepage.sectionFooter') }}" class="nav-link-child {{ Route::is('get.homepage.sectionFooter') ? 'sidenav-a' : '' }}"><span class="nav-label">Footer section</span></a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Route::is('get.newsletter') ? 'sidenav-active sidenav-a' : '' }}">
                    <a class="nav-link {{ Route::is('get.newsletter') ? 'sidenav-a' : '' }}" href="{{ route('get.newsletter') }}">
                        <i class="ni ni-send text-primary"></i> <span class="nav-label">{{ __('Newsletter') }}</span>
                        <span class="noti noti-nav text-white shadow">{{ \App\Newsletter::all()->count() }}</span>
                    </a>
                </li>
            </ul>
            <hr class="my-3">
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a href="" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span class="nav-label">{{ __('Logout') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



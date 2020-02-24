<nav class="navbar navbar-top navbar-expand-md navbar-dark border-bottom" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <!-- Form -->
        <form id="navbar-search-main" class="navbar-search navbar-search-light form-inline mr-sm-3">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form>
        <!--
        <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item">
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                    <div class="px-3 py-3">
                        <h6 class="text-sm text-muted m-0">You have<strong class="text-primary"> 13 </strong>notifications</h6>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto"><img src="{{ URL::to('dash/img/theme/avatar-default.png') }}" class="avatar rounded-circle" alt="Image placeholder"/></div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">Jon Snow</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>2 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                            </div>
                        </a>
                        <a href="" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                                <div class="col-auto"><img src="{{ URL::to('dash/img/theme/team-3-800x800.jpg') }}" class="avatar rounded-circle" alt="Image placeholder"/></div>
                                <div class="col ml--2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="mb-0 text-sm">Barbara Tyler</h4>
                                        </div>
                                        <div class="text-right text-muted">
                                            <small>2 hrs ago</small>
                                        </div>
                                    </div>
                                    <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-ungroup"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                    <div class="row shortcuts px-4">
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                <i class="ni ni-calendar-grid-58"></i>
                            </span>
                            <small>Calendar</small>
                        </a>
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                <i class="ni ni-email-83"></i>
                            </span>
                            <small>Email</small>
                        </a>
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                <i class="ni ni-credit-card"></i>
                            </span>
                            <small>Payments</small>
                        </a>
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                <i class="ni ni-books"></i>
                            </span>
                            <small>Reports</small>
                        </a>
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                <i class="ni ni-pin-3"></i>
                            </span>
                            <small>Maps</small>
                        </a>
                        <a href="#" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                <i class="ni ni-basket"></i>
                            </span>
                            <small>Shop</small>
                        </a>
                    </div>
                </div>
            </li>
        </ul> -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" id="admin_nava" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <div class="media-body mr-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold"><strong>Hello, </strong> {{ Auth::user()->name }}</span>
                        </div>
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
                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

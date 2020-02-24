@extends('layouts.admin')
@section('title')
    Dashboard | Home
@stop
@section('pageTitle')
    Home
@endsection
@section('first-card')
    <?php
    $quote_noti =  \App\Quote::all()->where('seen', '1')->count();
    $feed_noti =  \App\Feedback::all()->where('seen', '1')->count();
    ?>
    <div class="row mb-3">
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Facebook</h5>
                        </div>
                        <div class="col-auto">
                            <a href="https://www.facebook.com/102543527821470" target="_blank">
                                <div class="icon icon-shape fb-blue text-white rounded-circle shadow">
                                    <i class="zmdi zmdi-facebook"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    <div class="fb-like" data-href="https://www.facebook.com/102543527821470" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Twitter</h5>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape tt-blue text-white rounded-circle shadow">
                                <i class="zmdi zmdi-twitter"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <a class="twitter-follow-button" href="https://twitter.com/aflogistics_gh">Follow @aflogistics_gh</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Newsletter</h5>
                            <span class="h2 font-weight-bold mb-0">{{ \App\Newsletter::all()->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-send"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span class="text-nowrap">Since yesterday</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Shipment Published</h5>
                            <span class="h2 font-weight-bold mb-0">{{ \App\Shipment::all()->where('publish_status', '1')->count() }}</span>
                        </div>
                        <a href="{{ route('get.shipments') }}">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-delivery-fast"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Shipment draft</h5>
                            <span class="h2 font-weight-bold mb-0">{{ \App\Shipment::all()->where('publish_status', '0')->count() }}</span>
                        </div>
                        <a href="{{ route('get.draft') }}">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="ni ni-email-83"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Quote Request</h5>
                            <span class="h2 font-weight-bold mb-0">{{ \App\Quote::all()->count() }}</span>
                        </div>
                        <a href="{{ route('get.adminQuote') }}">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="ni ni-spaceship"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Customer Feedback</h5>
                            <span class="h2 font-weight-bold mb-0">{{ \App\Feedback::all()->count() }}</span>
                        </div>
                        <a href="{{ route('get.feedback') }}">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-6 mb-5 mb-xl-0">
            <div class="card shadow bg-gradient-success border-0">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-white text-muted ls-2 mb-1"><span class="alert-icon"><i class="ni ni-bell-55"></i></span>Alerts / Notifications</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 415px">
                    @if ($quote_noti || $feed_noti)
                        @if ($quote_noti)
                            <a href="{{ route('get.adminQuote') }}">
                                <div class="alert dash-alert alert-secondary alert-dismissible fade show" role="alert" style="background-color: rgba(248, 251, 252, 0.6);">
                                    <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                                    <span class="alert-text"><strong>New Quote!</strong> You have ({{ $quote_noti }}) new quote request!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" class="text-gray zmdi zmdi-close"></span>
                                    </button>
                                </div>
                            </a>
                        @endif
                            @if ($feed_noti)
                                <a href="{{ route('get.feedback') }}">
                                    <div class="alert dash-alert alert-secondary alert-dismissible fade show" role="alert" style="background-color: rgba(248, 251, 252, 0.6);">
                                        <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                                        <span class="alert-text"><strong>New Feedback!</strong> You have ({{ $feed_noti }}) new feedback!</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" class="text-gray zmdi zmdi-close"></span>
                                        </button>
                                    </div>
                                </a>
                            @endif
                        @else
                        <div class="alert dash-alert alert-secondary fade show" role="alert" style="background-color: rgba(248, 251, 252, 0.6);">
                            <span class="alert-text"><strong>No new notification!</strong></span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                            <h2 class="text-white mb-0">Projections</h2>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                        <span class="d-none d-md-block">Week</span>
                                        <span class="d-md-none">W</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('third-card')
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Page visits</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Page name</th>
                            <th scope="col">Visitors</th>
                            <th scope="col">Unique users</th>
                            <th scope="col">Bounce rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                /aflogisticsandmining/
                            </th>
                            <td>
                                4,569
                            </td>
                            <td>
                                340
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /aflogisticsandmining/index.html
                            </th>
                            <td>
                                3,985
                            </td>
                            <td>
                                319
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /aflogisticsandmining/quote
                            </th>
                            <td>
                                3,513
                            </td>
                            <td>
                                294
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /aflogisticsandmining/services
                            </th>
                            <td>
                                2,050
                            </td>
                            <td>
                                147
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /aflogisticsandmining/gallery
                            </th>
                            <td>
                                1,795
                            </td>
                            <td>
                                190
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Social traffic</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Referral</th>
                            <th scope="col">Visitors</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                Facebook
                            </th>
                            <td>
                                1,480
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">60%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Instagram
                            </th>
                            <td>
                                3,678
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">75%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                twitter
                            </th>
                            <td>
                                2,645
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">30%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

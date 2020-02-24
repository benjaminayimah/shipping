@extends('layouts.master')
@section('title')
    AF Logistics - Get a Quote!
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
                    <h3 class="section-title">Request a free quote.</h3>
                    <p>We always use best & the most safest fleets</p>
                    <form id="quote_form" method="post" action="{{ route('post.quote') }}">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Full name</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Phone number</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                                <div class="col-sm-6">
                                    <label>Company</label>
                                    <input class="form-control" type="text" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Departure city</label>
                                    <input class="form-control" type="text" name="departureCity">
                                </div>
                                <div class="col-sm-6">
                                    <label>Delivery city</label>
                                    <input class="form-control" type="text" name="deliveryCity">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Weight(Kg)</label>
                                    <input class="form-control" type="text" name="weight">
                                </div>
                                <div class="col-sm-6">
                                    <label>Dimension</label>
                                    <input class="form-control" type="text" name="dimension">
                                </div>
                            </div>
                        </div>
                        <div>
                            <input  name="airFreighting" id="airFreighting" type="checkbox">
                            <label for="airFreighting">
                                <span>Air freighting</span>
                            </label>
                        </div>
                        <div>
                            <input  name="seaFreighting" id="seaFreighting" type="checkbox">
                            <label for="seaFreighting">
                                <span>Sea freighting</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Additional info</label>
                            <textarea class="form-control" name="additionalInfo" rows="5"></textarea>
                        </div>
                        <div class="form-group w-100">
                            <button type="submit" class="btn section-btn btn-blue-gd submit-btn" data-target="quote_form" data-spin="quote_spin">SUBMIT <div id="quote_spin" class="lazy-loader-sm"></div></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6"></div>
            </div>

        </div>
    </section>
    @include('includes.footer')
@stop

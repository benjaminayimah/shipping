@extends('layouts.master')
@section('title')
    AF Logistics - Shipment tracker
@stop
@section('body')
    @include('includes.header')

    <style>
        .slider .item{ height: 340px !important;}
        legend{ border-bottom: none;}
    </style>
    <link href="{{ URL::to('css/alt-css.css') }}" rel="stylesheet">
    <section id="home" class="slider" style="position:relative;">
        <div>
            <div class="owl-carousel owl-theme">
                <!-- banner 6 -->
                <div class="item item-gallery" data-stellar-background-ratio="0.5">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-8 col-sm-12 slider-caption-main">
                                <h1>Shipment Status for [{{ $shipment->tracking_id }}]</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section data-stellar-background-ratio="0.5" style="padding: 70px 0;">
        <div class="container">
            <div class="card-body">
                @if ($shipment != null)
                    <div class="card-body shipment_details">
                        <fieldset>
                            <legend>Customer info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    <td>Customer email:</td>
                                    @if ($shipment->email)
                                        <td>{{ $shipment->email }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Order info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    <td><strong>Order status:</strong></td>
                                    @if ($shipment->order_status)
                                        <td><strong>{{ $shipment->order_status }}</strong></td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Pick up?:</td>
                                    @if ($shipment->pick_up)
                                        <td>{{ $shipment->pick_up }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Total amount:</td>
                                    @if ($shipment->price)
                                        <td>GHC {{ $shipment->price }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Cargo info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    <td>Tracking ID:</td>
                                    <td>{{ $shipment->tracking_id }}</td>
                                </tr>
                                <tr>
                                    <td>Shipment type:</td>
                                    @if ($shipment->shipment_type)
                                        <td>{{ $shipment->shipment_type }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Cargo name:</td>
                                    @if ($shipment->cargo_name)
                                        <td>{{ $shipment->cargo_name }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Cargo type:</td>
                                    @if ($shipment->cargo_type)
                                        <td>{{ $shipment->cargo_type }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Total estimated weight:</td>
                                    @if ($shipment->est_weight)
                                        <td>{{ $shipment->est_weight }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Packaging:</td>
                                    @if ($shipment->packaging)
                                        <td>{{ $shipment->packaging }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Quantity:</td>
                                    @if ($shipment->quantity)
                                        <td>{{ $shipment->quantity }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Insurance required?</td>
                                    @if ($shipment->insurance)
                                        <td>{{ $shipment->insurance }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Sender's info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    <td>Country:</td>
                                    @if ($shipment->sender_country)
                                        <td>{{ $shipment->sender_country }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>State/Region:</td>
                                    @if ($shipment->sender_state)
                                        <td>{{ $shipment->sender_state }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Town/City:</td>
                                    @if ($shipment->sender_city)
                                        <td>{{ $shipment->sender_city }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>ZIP code:</td>
                                    @if ($shipment->sender_zipcode)
                                        <td>{{ $shipment->sender_zipcode }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Street Address:</td>
                                    @if ($shipment->sender_streetadd)
                                        <td>{{ $shipment->sender_streetadd }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Apartment, suite, unit:</td>
                                    @if ($shipment->sender_apartment)
                                        <td>{{ $shipment->sender_apartment }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Name/Company:</td>
                                    @if ($shipment->sender_name)
                                        <td>{{ $shipment->sender_name }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Phone number:</td>
                                    @if ($shipment->sender_number)
                                        <td>{{ $shipment->sender_number }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Receiver's info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    <td>Country:</td>
                                    @if ($shipment->receiver_state)
                                        <td>{{ $shipment->receiver_state }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>State/Region:</td>
                                    @if ($shipment->receiver_state)
                                        <td>{{ $shipment->receiver_state }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Town/City:</td>
                                    @if ($shipment->receiver_city)
                                        <td>{{ $shipment->receiver_city }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>ZIP code:</td>
                                    @if ($shipment->receiver_zipcode)
                                        <td>{{ $shipment->receiver_zipcode }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Street Address:</td>
                                    @if ($shipment->sender_streetadd)
                                        <td>{{ $shipment->sender_streetadd }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Apartment, suite, unit:</td>
                                    @if ($shipment->receiver_apartment)
                                        <td>{{ $shipment->receiver_apartment }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Name/Company:</td>
                                    @if ($shipment->receiver_name)
                                        <td>{{ $shipment->receiver_name }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Phone number:</td>
                                    @if ($shipment->receiver_number)
                                        <td>{{ $shipment->receiver_number }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        @if ($shipment->pick_up == 'yes')
                            <fieldset>
                                <legend>Pickup info</legend>
                                <table class="shipment-details-table">
                                    <tbody>
                                    <tr>
                                        <td>Contact name:</td>
                                        @if ($shipment->pickup_name)
                                            <td>{{ $shipment->pickup_name }}</td>
                                        @else
                                            <td>n/a</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Phone number:</td>
                                        @if ($shipment->pickup_number)
                                            <td>{{ $shipment->pickup_number }}</td>
                                        @else
                                            <td>n/a</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Pick up date:</td>
                                        @if ($shipment->pickup_date)
                                            <td>{{ $shipment->pickup_date }}</td>
                                        @else
                                            <td>n/a</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        @endif
                    </div>
                    @else
                    Not available!
                @endif
            </div>
        </div>
    </section>
    @include('includes.footer')
@stop

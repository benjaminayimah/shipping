@extends('layouts.admin')
@section('title')
    Dashboard | Shipment details
@stop
@section('pageTitle')
    Details
@stop
@section('titlemain')
    <li class="breadcrumb-item"><a href="{{ route('get.shipments') }}">Shipments</a></li>
@stop

@section('second-card')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                @if($shipment)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $shipment->title }}</h3>
                        </div>
                        <div class=" text-right">
                            <a href="{{ route('get.editshipment', ['id' => $shipment->tracking_id]) }}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
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
                                    <td>Order status:</td>
                                    @if ($shipment->order_status)
                                         <td>{{ $shipment->order_status }}</td>
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
                <div class="card-footer border-0">
                </div>
                @else
                    <div class="card-header border-0"></div>
                    <div class="card-body">The item you are looking for does not exist</div>
                    <div class="card-footer border-0"></div>
                @endif
            </div>
        </div>
        @if ($shipment)
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-body border-0 shipment_details">
                        <fieldset>
                            <legend>Additional info</legend>
                            <table class="shipment-details-table">
                                <tbody>
                                <tr>
                                    @if ($shipment->additional_details)
                                        <td>{{ $shipment->additional_details }}</td>
                                    @else
                                        <td>n/a</td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <table class="footnote-table">
                            <tbody>
                            <tr><td>Published by:</td><td>{{ $shipment->author }}</td></tr>
                            <tr><td>Date:</td><td>{{ $shipment->created_at }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection


@extends('layouts.shipment-add-master')
@section('title')
    Dashboard | Edit shipment
@stop
@section('pageTitle')
    Edit shipment
@stop
@section('left-content')
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow">
            @if ($shipment)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $shipment->title }}</h3>
                        </div>
                        <div class=" text-right">
                            <a href="{{ route('get.viewDetails', ['id' => $shipment->tracking_id]) }}" type="button" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
                <div>
                    <form method="post" action="{{ route('post.shipmentEdit') }}" id="shipment_form">
                        @csrf
                        <hr />
                        <div class="form-group">
                            <label for="title">Title *:</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ $shipment->title }}">
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>ADDITIONAL INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="cusEmail">Customer email address:</label>
                                    <input type="email"  id="cusEmail" class="form-control" name="customerEmail" value="{{ $shipment->email }}">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>ORDER INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="orderStatus">Order status:</label>
                                    <select class="form-control"  name="orderStatus" id="orderStatus">
                                        <option selected value="{{ $shipment->order_status }}">{{ $shipment->order_status }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'ShipmentStatus')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pick up?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" @if($shipment->pick_up == 'yes') checked @endif name="pickUp" id="inlineRadio1" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" @if($shipment->pick_up == 'no') checked @endif name="pickUp" id="inlineRadio2" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <label for="amount">Total Amount:</label>
                                            <input type="number"  id="amount" class="form-control" name="amount" value="{{ $shipment->price }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="cargoType">Currency:</label>
                                            <select class="form-control"  name="currency" id="currency">
                                                <option selected value="{{ $shipment->currency }}">{{ $shipment->currency }}</option>
                                                @foreach($options as $option)
                                                    @if ($option->type == 'currency')
                                                        <option value="{{ $option->value }}">{{ $option->value }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>CARGO INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Tracking ID *: </label>
                                    <div>{{ $shipment->tracking_id }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="shipmentType">Shipment type:</label>
                                    <select class="form-control"  name="shipmentType" id="shipmentType">
                                        <option selected value="{{ $shipment->shipment_type }}">{{ $shipment->shipment_type }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'shipmentType')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cargoName">Cargo name:</label>
                                    <input type="text" id="cargoName" class="form-control" name="cargoName" value="{{ $shipment->cargo_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="cargoType">Cargo type:</label>
                                    <select class="form-control"  name="cargoType" id="cargoType">
                                        <option selected value="{{ $shipment->cargo_type }}">{{ $shipment->cargo_type }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'cargoType')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <label for="estimatedWeight">Total estimated weight:</label>
                                            <input type="text" id="estimatedWeight" class="form-control" name="estimatedWeight" value="{{ $shipment->est_weight }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="weightUnit">Unit:</label>
                                            <select class="form-control"  name="weightUnit" id="weightUnit">
                                                <option selected value="{{ $shipment->weight_unit }}">{{ $shipment->weight_unit }}</option>
                                                @foreach($options as $option)
                                                    @if ($option->type == 'WeightUnit')
                                                        <option value="{{ $option->value }}">{{ $option->value }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="packaging">Packaging:</label>
                                    <select class="form-control"  name="packaging" id="packaging">
                                        <option selected value="{{ $shipment->packaging }}">{{ $shipment->packaging }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'PackagingType')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" class="form-control" name="quantity" value="{{ $shipment->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label>Insurance required?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="insurance" id="insuranceRadio1" @if($shipment->insurance == 'yes') checked @endif value="yes">
                                        <label class="form-check-label" for="insuranceRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="insurance" id="insuranceRadio2" @if($shipment->insurance == 'no') checked @endif value="no">
                                        <label class="form-check-label" for="insuranceRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>SENDER'S INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="senderCountry">Country:</label>
                                    <select class="form-control"  name="senderCountry" id="senderCountry">
                                        <option selected value="{{ $shipment->sender_country }}">{{ $shipment->sender_country }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'location')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="senderstate">State/Region:</label>
                                    <input type="text"  id="senderstate" class="form-control" name="senderstate" value="{{ $shipment->sender_state }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderCity">Town/City:</label>
                                    <input type="text"  id="senderCity" class="form-control" name="senderCity" value="{{ $shipment->sender_city }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderZipcode">ZIP code:</label>
                                    <input type="text"  id="senderZipcode" class="form-control" name="senderZipcode" value="{{ $shipment->sender_zipcode }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderAddress">Street Address:</label>
                                    <input type="text"  id="senderAddress" class="form-control" name="senderAddress" value="{{ $shipment->sender_streetadd }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderApartment">Apartment, suite, unit:</label>
                                    <input type="text"  id="senderApartment" class="form-control" name="senderApartment" value="{{ $shipment->sender_apartment }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderName">Name/Company:</label>
                                    <input type="text"  id="senderName" class="form-control" name="senderName" value="{{ $shipment->sender_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="senderNumber">Phone number:</label>
                                    <input type="number"  id="senderNumber" class="form-control" name="senderNumber" value="{{ $shipment->sender_number }}">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>RECEIVER'S INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="receiverCountry">Country:</label>
                                    <select class="form-control"  name="receiverCountry" id="receiverCountry">
                                        <option selected value="{{ $shipment->receiver_country }}">{{ $shipment->receiver_country }}</option>
                                        @foreach($options as $option)
                                            @if ($option->type == 'location')
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="receiverstate">State/Region:</label>
                                    <input type="text"  id="receiverstate" class="form-control" name="receiverstate" value="{{ $shipment->receiver_state }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverCity">Town/City:</label>
                                    <input type="text"  id="receiverCity" class="form-control" name="receiverCity" value="{{ $shipment->receiver_city }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverZipcode">ZIP code:</label>
                                    <input type="text"  id="receiverZipcode" class="form-control" name="receiverZipcode" value="{{ $shipment->receiver_zipcode }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverAddress">Street Address:</label>
                                    <input type="text"  id="receiverAddress" class="form-control" name="receiverAddress" value="{{ $shipment->receiver_streetadd }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverApartment">Apartment, suite, unit:</label>
                                    <input type="text"  id="receiverApartment" class="form-control" name="receiverApartment" value="{{ $shipment->receiver_apartment }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverName">Name/Company:</label>
                                    <input type="text"  id="receiverName" class="form-control" name="receiverName" value="{{ $shipment->receiver_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="receiverNumber">Phone number:</label>
                                    <input type="number"  id="receiverNumber" class="form-control" name="receiverNumber" value="{{ $shipment->receiver_number }}">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-indication"><span>PICK UP INFO</span></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="pickUpName">Contact name:</label>
                                    <input type="text"  id="pickUpName" class="form-control" name="pickUpName" value="{{ $shipment->pickup_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="pickUpPhoneNumber">Phone number:</label>
                                    <input type="text"  id="pickUpPhoneNumber" class="form-control" name="pickUpPhoneNumber" value="{{ $shipment->pickup_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="pickUpDate">Pick up date:</label>
                                    <input type="text"  id="pickUpDate" class="form-control" name="pickUpDate" value="{{ $shipment->pickup_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="additionalInfo">Additional info:</label>
                                    <textarea type="text"  id="additionalInfo" rows="3" class="form-control" name="additionalInfo">{{ $shipment->additional_details }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <div class="form-row">
                                    <input name="id" type="hidden" value="{{ $shipment->id }}">
                                    <input type="hidden" id="status" name="status" value="1">
                                    <div class="col-sm-6 mb-3">
                                        <a href="javascript: void (0)" id="draft_btn" class="btn w-100">Save to draft</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="javascript: void (0)" id="publish_btn" class="btn btn-primary w-100">Publish</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @else
                <div>
                    <div class="card-header border-0"></div>
                    <div class="card-body">The item you are looking for does not exist</div>
                    <div class="card-footer border-0"></div>
                </div>
            @endif
        </div>
    </div>
@stop

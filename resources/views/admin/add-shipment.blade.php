@extends('layouts.shipment-add-master')
@section('title')
    Dashboard | Add shipment
@stop
@section('pageTitle')
    New shipment
@stop
@section('left-content')
    <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Add a new shipment</h3>
                    </div>
                    <div class=" text-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add new category</button>
                    </div>
                </div>
            </div>
            <div>
                <form method="post" action="{{ route('post.shipment') }}" id="shipment_form">
                    @csrf
                    <hr />
                    <div class="form-group">
                        <label for="title">Title *:</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title of shipment e.g. wines">
                    </div>
                    <hr />
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-indication"><span>CUSTOMER INFO</span></div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="cusEmail">Customer email:</label>
                                <input type="email"  id="cusEmail" class="form-control" name="customerEmail" value="{{ old('customerEmail') }}" placeholder="Customer email">
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
                                    <option selected="" value="">Select Option...</option>
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
                                    <input class="form-check-input" type="radio" name="pickUp" id="inlineRadio1" value="yes">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pickUp" id="inlineRadio2" value="no">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <label for="amount">Total Amount:</label>
                                        <input type="number"  id="amount" class="form-control" name="amount" value="{{ old('amount') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="cargoType">Currency:</label>
                                        <select class="form-control"  name="currency" id="currency">
                                            <option selected="" value="">Select Option...</option>
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
                                <div id="track_info"><small class="text-warning"><i class="zmdi zmdi-info"></i> This field is required, click to generate tracking ID</small></div>
                                <div class="d-flex"><a class="btn btn-info btn-sm" id="generateIDbtn" href="javascript: void (0)">Generate tracking ID</a><span id="trackingID_hold"></span></div>
                                <input type="hidden" id="trackingIDinput" name="tracking_id" value="{{ old('trackingId') }}">
                            </div>
                            <div class="form-group">
                                <label for="shipmentType">Shipment type:</label>
                                <select class="form-control"  name="shipmentType" id="shipmentType">
                                    <option selected="" value="">Select Option...</option>
                                    @foreach($options as $option)
                                        @if ($option->type == 'shipmentType')
                                            <option value="{{ $option->value }}">{{ $option->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cargoName">Cargo name:</label>
                                <input type="text" id="cargoName" class="form-control" name="cargoName" value="{{ old('cargoName') }}" placeholder="Cargo name e.g. Oceanline Express">
                            </div>
                            <div class="form-group">
                                <label for="cargoType">Cargo type:</label>
                                <select class="form-control"  name="cargoType" id="cargoType">
                                    <option selected="" value="">Select Option...</option>
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
                                        <input type="text" id="estimatedWeight" class="form-control" name="estimatedWeight" value="{{ old('estimatedWeight') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="weightUnit">Unit:</label>
                                        <select class="form-control"  name="weightUnit" id="weightUnit">
                                            <option selected="" value="">Select Option...</option>
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
                                    <option selected="" value="">Select Option...</option>
                                    @foreach($options as $option)
                                        @if ($option->type == 'PackagingType')
                                            <option value="{{ $option->value }}">{{ $option->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" class="form-control" name="quantity" value="{{ old('quantity') }}">
                            </div>
                            <div class="form-group">
                                <label>Insurance required?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insurance" id="insuranceRadio1" value="yes">
                                    <label class="form-check-label" for="insuranceRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insurance" id="insuranceRadio2" value="no">
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
                                    <option selected="" value="">Select Option...</option>
                                    @foreach($options as $option)
                                        @if ($option->type == 'location')
                                            <option value="{{ $option->value }}">{{ $option->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="senderstate">State/Region:</label>
                                <input type="text"  id="senderstate" class="form-control" name="senderstate" value="{{ old('senderstate') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderCity">Town/City:</label>
                                <input type="text"  id="senderCity" class="form-control" name="senderCity" value="{{ old('senderCity') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderZipcode">ZIP code:</label>
                                <input type="text"  id="senderZipcode" class="form-control" name="senderZipcode" value="{{ old('senderZipcode') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderAddress">Street Address:</label>
                                <input type="text"  id="senderAddress" class="form-control" name="senderAddress" value="{{ old('senderAddress') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderApartment">Apartment, suite, unit:</label>
                                <input type="text"  id="senderApartment" class="form-control" name="senderApartment" value="{{ old('senderApartment') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderName">Name/Company:</label>
                                <input type="text"  id="senderName" class="form-control" name="senderName" value="{{ old('senderName') }}">
                            </div>
                            <div class="form-group">
                                <label for="senderNumber">Phone number:</label>
                                <input type="number"  id="senderNumber" class="form-control" name="senderNumber" value="{{ old('senderNumber') }}">
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
                                    <option selected="" value="">Select Option...</option>
                                    @foreach($options as $option)
                                        @if ($option->type == 'location')
                                            <option value="{{ $option->value }}">{{ $option->value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="receiverstate">State/Region:</label>
                                <input type="text"  id="receiverstate" class="form-control" name="receiverstate" value="{{ old('receiverstate') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverCity">Town/City:</label>
                                <input type="text"  id="receiverCity" class="form-control" name="receiverCity" value="{{ old('receiverCity') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverZipcode">ZIP code:</label>
                                <input type="text"  id="receiverZipcode" class="form-control" name="receiverZipcode" value="{{ old('receiverZipcode') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverAddress">Street Address:</label>
                                <input type="text"  id="receiverAddress" class="form-control" name="receiverAddress" value="{{ old('receiverAddress') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverApartment">Apartment, suite, unit:</label>
                                <input type="text"  id="receiverApartment" class="form-control" name="receiverApartment" value="{{ old('receiverApartment') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverName">Name/Company:</label>
                                <input type="text"  id="receiverName" class="form-control" name="receiverName" value="{{ old('receiverName') }}">
                            </div>
                            <div class="form-group">
                                <label for="receiverNumber">Phone number:</label>
                                <input type="number"  id="receiverNumber" class="form-control" name="receiverNumber" value="{{ old('receiverNumber') }}">
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
                                <input type="text"  id="pickUpName" class="form-control" name="pickUpName" value="{{ old('pickUpName') }}">
                            </div>
                            <div class="form-group">
                                <label for="pickUpPhoneNumber">Phone number:</label>
                                <input type="text"  id="pickUpPhoneNumber" class="form-control" name="pickUpPhoneNumber" value="{{ old('pickUpPhoneNumber') }}">
                            </div>
                            <div class="form-group">
                                <label for="pickUpDate">Pick up date:</label>
                                <input type="text"  id="pickUpDate" class="form-control" name="pickUpDate" value="{{ old('pickUpDate') }}">
                            </div>
                            <div class="form-group">
                                <label for="additionalInfo">Additional info:</label>
                                <textarea type="text"  id="additionalInfo" rows="3" class="form-control" name="additionalInfo">{{ old('additionalInfo') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <div class="form-row">
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
        </div>
    </div>
@stop


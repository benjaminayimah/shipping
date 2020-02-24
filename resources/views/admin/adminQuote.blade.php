@extends('layouts.admin')
@section('title')
    Dashboard | Quotes
@stop
@section('pageTitle')
    Quotes
@endsection
@section('titlemain')
    <!--<li class="breadcrumb-item"><a href=""></a></li>-->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Quotes({{ count($quotes) }})</h3>
                        </div>
                        <div class=" text-right">
                            {{ $quotes->links() }}
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="feedback" class="table align-items-center table-flush no-border">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($quotes) > 0)
                            @foreach($quotes as $quote)
                                <div class="d-none">
                                    <span id="quote_company_{{ $quote->id }}">{{ $quote->company }}</span>
                                    <span id="quote_city1_{{ $quote->id }}">{{ $quote->departure_city }}</span>
                                    <span id="quote_city2_{{ $quote->id }}">{{ $quote->delivery_city }}</span>
                                    <span id="quote_weight_{{ $quote->id }}">{{ $quote->weight }}</span>
                                    <span id="quote_dm_{{ $quote->id }}">{{ $quote->dimensions }}</span>
                                    <span id="quote_shm_{{ $quote->id }}">{{ $quote->shipping_mode }}</span>
                                    <span id="quote_addinfo_{{ $quote->id }}">{{ $quote->addition_info }}</span>
                                    <span id="feedback_msg_{{ $quote->id }}">{{ $quote->phone }}</span>
                                </div>
                                <tr data-name="feedback_name_{{ $quote->id }}" data-info="quote_addinfo_{{ $quote->id }}" data-shipMode="quote_shm_{{ $quote->id }}" data-dimension="quote_dm_{{ $quote->id }}" data-weight="quote_weight_{{ $quote->id }}" data-city1="quote_city1_{{ $quote->id }}" data-city2="quote_city2_{{ $quote->id }}" data-company="quote_company_{{ $quote->id }}" data-email="feedback_email_{{ $quote->id }}" data-body="feedback_msg_{{ $quote->id }}" data-id="{{ $quote->id }}" data-date="feedback_date_{{ $quote->id }}">
                                    <td><span id="feedback_name_{{ $quote->id }}">{{ $quote->name }}</span></td>
                                    <td><span id="feedback_email_{{ $quote->id }}">{{ $quote->email }}</span></td>
                                    <td><span id="feedback_date_{{ $quote->id }}">{{ $quote->created_at }}</span></td>
                                    <td>
                                        <a class="list-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div class="dropdown-menu" id="shipment_list_menu">
                                            <a href="javascript: void (0)" class="dropdown-item text-danger del-quote" data-target="quote_del_form_{{ $quote->id }}">
                                                <form method="post" action="{{ route('post.del.quote') }}" class="d-none" id="quote_del_form_{{ $quote->id }}">
                                                    @csrf <input type="hidden" name="inputId" value="{{ $quote->id }}">
                                                </form>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td><strong>No quote available</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0">
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow" >
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Quote preview</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="feedback_main_body">
                    <div><small class="text-primary">Sender's details</small></div>
                    <div><label>Name: </label><span id="feedback_name"></span></div>
                    <div><label>Email: </label><span id="feedback_email"></span></div>
                    <div><label>Phone: </label><span id="feedback_body"></span></div>
                    <div><label>Company: </label><span id="quote_company"></span></div>
                    <hr />
                    <div><small class="text-primary">Shipment details</small></div>
                    <div><label>Departure city: </label><span id="quote_city1"></span></div>
                    <div><label>Delivery city: </label><span id="quote_city2"></span></div>
                    <div><label>Weight(Kg): </label><span id="quote_weight"></span></div>
                    <div><label>Dimensions: </label><span id="quote_dimensions"></span></div>
                    <div><label>Shipping mode: </label><span id="quote_shippingmode"></span></div>
                    <div><label>Additional info: </label><span id="quote_info"></span></div>
                </div>
                <div class="card-footer" style="position: relative">
                    <div class="loader fetch-spin"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('title')
    Dashboard | Draft
@stop
@section('pageTitle')
    Draft
@endsection
@section('titlemain')
    <li class="breadcrumb-item"><a href="{{ route('get.shipments') }}">Shipments</a></li>
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-10 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Draft({{ count($drafts) }})</h3>
                        </div>
                        <div class=" text-right">
                            <a href="{{ route('get.addShipment') }}" class="btn btn-primary btn-sm">Add new shipment</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="shipments_table" class="table align-items-center table-flush no-border">
                        <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th>Tracking ID</th>
                            <th>Order Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($drafts) > 0)
                            @foreach($drafts as $draft)
                                <tr>
                                    <td>{{ $draft->title }}</td>
                                    <td>{{ $draft->tracking_id }}</td>
                                    <td>{{ $draft->order_status }}</td>
                                    <td>{{ $draft->created_at }}</td>
                                    <td>
                                        <a class="list-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div class="dropdown-menu" id="shipment_list_menu">
                                            <a href="{{ route('get.viewDetails', ['id' => $draft->tracking_id]) }}" class="dropdown-item">
                                                <span>{{ __('View details') }}</span>
                                            </a>
                                            <a href="{{ route('get.adminAwb') }}" class="dropdown-item">
                                                <span>{{ __('Generate AWBill') }}</span>
                                            </a>
                                            <a href="{{ route('get.editshipment', ['id' => $draft->tracking_id]) }}" class="dropdown-item">
                                                <span>{{ __('Edit') }}</span>
                                            </a>
                                            <a href="javascript: void (0)" class="dropdown-item text-danger ship-del-btn" data-target="draft_del_form_{{ $draft->id }}">
                                                <form method="post" action="{{ route('post.del.shipment') }}" class="d-none" id="draft_del_form_{{ $draft->id }}">
                                                    @csrf <input type="hidden" name="inputId" value="{{ $draft->id }}">
                                                </form>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <tr>
                                <td><strong>No item available</strong></td>
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
                    @if (count($drafts) > 0)
                        {{ $drafts->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

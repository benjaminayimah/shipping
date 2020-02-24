@extends('layouts.admin')
@section('pageTitle')
@endsection
@section('titlemain')
    <li class="breadcrumb-item"><a href="{{ route('get.shipments') }}">Shipments</a></li>
@endsection
@section('second-card')
    <div class="row">
        @yield('left-content')
        <div class="col-xl-4 opt-col">
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Shipment type</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="11" data-title="Shipment type" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'shipmentType')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Cargo type</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="22" data-title="Cargo type" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'cargoType')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Packaging type</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="33" data-title="Packaging type" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'PackagingType')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Weight unit</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="44" data-title="Weight unit" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'WeightUnit')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Shipment status</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="55" data-title="Shipment status" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'ShipmentStatus')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Location</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="66" data-title="Location" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'location')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Currency</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="77" data-title="Currency" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                @if ($option->type == 'currency')
                                    <tr>
                                        <td>
                                            {{ $option->value }}
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                    @csrf
                                                    <input type="hidden" name="dataID" value="{{ $option->id }}">
                                                </form>
                                                <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                                <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
    @include('admin.includes.opt-add-edit')
@endsection

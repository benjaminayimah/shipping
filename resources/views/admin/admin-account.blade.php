@extends('layouts.admin')
@section('title')
    Dashboard - User Account
@stop
@section('pageTitle')
    User Account
@endsection
@section('titlemain')
    <!--<li class="breadcrumb-item"><a href=""></a></li>-->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-10 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">User Account</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="cus-acc-details-holder">
                        <div class="delivery-add">
                            <div class="pull-left"><h6 class="cart-hd"> <span class="chkout-checked bg-grey"><i class="zmdi zmdi-check"></i></span>Account Details</h6></div>
                            <div class="pull-right">
                                <div class="d-flex">
                                    <a href="{{ route('get.userAccount.editDetails') }}" class="edit-add"><small><strong><i class="zmdi zmdi-edit"></i> Update account info</strong></small></a>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 15px 0">
                            <h6 class="text-uppercase no-margin" style="font-size: 14px; font-weight: 700; color: rgb(50,50,50)">{{ $user->name }}</h6>
                            <div class="add-details">
                                <p><span>{{ $user->email }}</span></p>
                                <a href="{{ route('get.userAccount.updatepass') }}" class="cnt-shop epp-blue">Change password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-0">
                </div>
            </div>
        </div>
    </div>
@endsection

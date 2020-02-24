@extends('layouts.admin')
@section('title')
    Dashboard - User Account
@stop
@section('pageTitle')
    Update account
@endsection
@section('titlemain')
    <li class="breadcrumb-item"><a href="{{ route('get.user.account') }}">Account home</a></li>
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-10 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Update account info</h3>
                        </div>
                        <div class=" text-right">
                            <a href="{{ route('get.user.account') }}" type="button" class="btn btn-primary btn-sm">Return back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.edit.acct') }}" class="mb-3">
                        @csrf
                        <div class="form-row details-row">
                            <div class="form-group col-md-6">
                                <label for="name">Full name *</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn no-border btn-sm btn-primary">Update Name</button>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="{{ route('post.edit.acct') }}">
                        @csrf
                        <div class="form-row details-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn no-border btn-sm btn-primary">Update Email</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-0">
                </div>
            </div>
        </div>
    </div>
@endsection

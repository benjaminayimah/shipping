@extends('layouts.admin')
@section('title')
    Dashboard - User management
@stop
@section('pageTitle')
    Add User
@endsection
@section('titlemain')
    <!--<li class="breadcrumb-item"><a href="">Dashboard</a></li>-->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create new user</h3>
                        </div>
                        <div class="col-4  text-right">
                            <a href="{{ route('get.userManagement') }}" class="btn btn-primary btn-sm">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('create.user') }}" role="form">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">Name</label>
                                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" type="text">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" type="email">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-role">Role</label>
                                <select name="role" id="input-role" class="form-control" placeholder="Role" >
                                    <option value="">-</option>
                                    <option value="0">Disabled</option>
                                    <option value="1">Member</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password">Password</label>
                                <input class="form-control" name="password" placeholder="Password" type="password">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" placeholder="Confirm password" type="password">
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="state" value="11">
                                <button type="submit" class="btn blue-bg my-4">Create account</button>
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

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
                            <h3 class="mb-0">User management</h3>
                        </div>
                        <div class="col-4  text-right">
                            <a href="{{ route('get.userManagement') }}" class="btn btn-primary btn-sm">Back to list</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($user)
                        <form method="post" action="{{ route('create.user') }}" role="form" autocomplete="off" >
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Name</label>
                                    <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" type="text">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="state" value="22">
                                    <input type="hidden" name="inputID" value="{{ $user->id }}">
                                    <input type="hidden" name="type" value="name">
                                    <button type="submit" class="btn blue-bg btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" action="{{ route('create.user') }}" role="form" autocomplete="off" >
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" type="email">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="state" value="22">
                                    <input type="hidden" name="inputID" value="{{ $user->id }}">
                                    <input type="hidden" name="type" value="email">
                                    <button type="submit" class="btn blue-bg btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" action="{{ route('create.user') }}" role="form" autocomplete="off" >
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password">Password</label>
                                    <input class="form-control" name="password" placeholder="Password" type="password">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="state" value="22">
                                    <input type="hidden" name="inputID" value="{{ $user->id }}">
                                    <input type="hidden" name="type" value="password">
                                    <button type="submit" class="btn blue-bg btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" action="{{ route('create.user') }}" role="form" autocomplete="off" >
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-role">Role</label>
                                    <select name="role" id="input-role" class="form-control" placeholder="Role" >
                                        <option value="{{ $user->user_role }}" selected>
                                            @if ($user->user_role == '0')
                                                {{ __('Disabled') }}
                                            @elseif ($user->user_role == '1')
                                                {{ __('Member') }}
                                            @elseif ($user->user_role == '2')
                                                {{ __('Admin') }}
                                            @elseif ($user->user_role == '3')
                                                {{ __('Super') }}
                                            @endif
                                        </option>
                                        <option value="0">Disabled</option>
                                        <option value="1">Member</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="state" value="22">
                                    <input type="hidden" name="inputID" value="{{ $user->id }}">
                                    <input type="hidden" name="type" value="role">
                                    <button type="submit" class="btn blue-bg btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    @else
                        User Not Found!
                    @endif
                </div>
                <div class="card-footer border-0">
                </div>
            </div>
        </div>
    </div>
@endsection

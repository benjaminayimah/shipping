@extends('layouts.admin')
@section('title')
    Dashboard - User management
@stop
@section('pageTitle')
    User management
@endsection
@section('titlemain')
    <!-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> -->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('get.userCreate') }}" class="btn btn-primary btn-sm">Add new user</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="user_managemet_table" class="table align-items-center table-flush no-border">
                        <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($users) > 0)
                            @foreach($users as $user)
                                @if ($user->user_role != '3')
                                    <tr>
                                        <td><span><img class="rounded-circle" style="height: 30px" src="{{ asset('dash/img/theme/avatar-default.png') }}" alt="default photo" /></span></td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                        @if ($user->user_role == '0')
                                            <td>{{ __('Disabled') }}</td>
                                        @elseif ($user->user_role == '1')
                                            <td class="@if(Auth::user()->id == $user->id) text-bold @endif">{{ __('Member') }}</td>
                                        @elseif ($user->user_role == '2')
                                            <td class="@if(Auth::user()->id == $user->id) text-bold @endif">{{ __('Admin') }}</td>
                                        @elseif ($user->user_role == '3')
                                            <td class="@if(Auth::user()->id == $user->id) text-bold @endif">{{ __('Super') }}</td>
                                        @endif
                                        <td>{{ $user->created_at }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->id != $user->id)
                                                @if (Auth::user()->user_role == '3' || (Auth::user()->user_role == '2' && ($user->user_role != '2' && $user->user_role != '3')))
                                                    <a class="list-toggler btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    <div class="dropdown-menu" id="shipment_list_menu">
                                                        <a href="{{ route('get.edituser', ['id' => $user->id]) }}" class="dropdown-item">
                                                            <span>{{ __('Edit') }}</span>
                                                        </a>
                                                        <a href="javascript: void (0)" class="dropdown-item text-danger user-del-btn" data-target="user_del_form_{{ $user->id }}">
                                                            <form method="post" action="{{ route('post.deluser') }}" class="d-none" id="user_del_form_{{ $user->id }}">
                                                                @csrf <input type="hidden" name="inputId" value="{{ $user->id }}">
                                                            </form>
                                                            <span>{{ __('Delete') }}</span>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @else
                            <tr>
                                <td>No user available</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0">
                    @if (count($users) > 0)
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

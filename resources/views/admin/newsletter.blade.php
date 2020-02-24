@extends('layouts.admin')
@section('title')
    Dashboard - Newsletter
@stop
@section('pageTitle')
    Newsletter
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
                            <h3 class="mb-0">Newsletter list</h3>
                        </div>
                        <div class="col-4 text-right">
                            <!--<a href="" class="btn btn-primary btn-sm">Add new user</a>-->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="user_managemet_table" class="table align-items-center table-flush no-border">
                        <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Date created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($newsletter) > 0)
                            @foreach($newsletter as $user)
                                <tr>
                                    <td><span><img class="rounded-circle" style="height: 30px" src="{{ asset('dash/img/theme/avatar-default.png') }}" alt="default photo" /></span></td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    <td>{{ $user->created_at }}</td>
                                    <td class="text-center">
                                        <a class="list-toggler btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div class="dropdown-menu" id="shipment_list_menu">
                                            <a href="javascript: void (0)" class="dropdown-item text-danger user-del-btn" data-target="user_del_form_{{ $user->id }}">
                                                <form method="post" action="{{ route('post.delnewsletter') }}" class="d-none" id="user_del_form_{{ $user->id }}">
                                                    @csrf <input type="hidden" name="inputId" value="{{ $user->id }}">
                                                </form>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
                    @if (count($newsletter) > 0)
                        {{ $newsletter->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

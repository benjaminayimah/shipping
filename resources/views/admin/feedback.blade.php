@extends('layouts.admin')
@section('title')
    Dashboard | Messages
@stop
@section('pageTitle')
    Feedback
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
                            <h3 class="mb-0">Feedback({{ count($feedback) }})</h3>
                        </div>
                        <div class=" text-right">
                            {{ $feedback->links() }}
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
                            <th>Message</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($feedback) > 0)
                            @foreach($feedback as $feed)
                                <tr data-name="feedback_name_{{ $feed->id }}" data-email="feedback_email_{{ $feed->id }}" data-body="feedback_msg_{{ $feed->id }}" data-id="{{ $feed->id }}" data-date="feedback_date_{{ $feed->id }}">
                                    <td><span id="feedback_name_{{ $feed->id }}">{{ $feed->name }}</span></td>
                                    <td><span id="feedback_email_{{ $feed->id }}">{{ $feed->email }}</span></td>
                                    <td><span id="feedback_msg_{{ $feed->id }}">{{ $feed->message }}</span></td>
                                    <td><span id="feedback_date_{{ $feed->id }}">{{ $feed->created_at }}</span></td>
                                    <td>
                                        <a class="list-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <div class="dropdown-menu" id="shipment_list_menu">
                                            <a href="javascript: void (0)" class="dropdown-item text-danger feed-del-btn" data-target="feed_del_form_{{ $feed->id }}">
                                                <form method="post" action="{{ route('post.del.feedback') }}" class="d-none" id="feed_del_form_{{ $feed->id }}">
                                                    @csrf <input type="hidden" name="inputId" value="{{ $feed->id }}">
                                                </form>
                                                <span>{{ __('Delete') }}</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td><strong>No message available</strong></td>
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
                            <h5 class="mb-0">Message preview</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="feedback_main_body">
                    <div><small class="text-primary">Sender's details</small></div>
                    <div><label>Name: </label><span id="feedback_name"></span></div>
                    <div><label>Email: </label><span id="feedback_email"></span></div>
                    <div><label>Date: </label><span id="feedback_date"></span></div>
                    <hr />
                    <div><small class="text-primary">Message</small></div>
                    <div><span id="feedback_body"></span></div>
                </div>
                <div class="card-footer" style="position: relative">
                    <div class="loader fetch-spin"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

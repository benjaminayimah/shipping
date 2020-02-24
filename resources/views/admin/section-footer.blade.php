@extends('admin.sections-master')

@section('pageTitle')
    Footer
@stop
@section('home-section-body')
    <h3>Section footer</h3>
    @if ($address)
        <div class="card card-body border-0 mb-4">
            <h4>Address</h4>
            <form method="post" action="{{ route('post.sectionsHead') }}">
                @csrf
                <div class="form-group mb-3">
                    <textarea name="body" class="form-control">{{ $address->body }}</textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $address->id }}">
                    <input type="hidden" name="name" value="servicesBody">
                    <button class="btn btn-outline-primary" type="submit">Update</button>
                    <a href="javascript:void (0)" class="btn btn-outline-danger ml-2 sec-del-btn" data-target="sec_{{ $address->id }}">Delete</a>
                </div>
            </form>
            <form class="d-none" id="sec_{{ $address->id }}" method="post" action="{{ route('post.del.hm-sec') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $address->id }}">
            </form>
        </div>
    @endif
    @if ($email)
        <div class="card card-body border-0 mb-4">
            <h4>Email</h4>
            <form method="post" action="{{ route('post.sectionsHead') }}">
                @csrf
                <div class="form-group mb-3">
                    <input name="body" class="form-control" value="{{ $email->body }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $email->id }}">
                    <input type="hidden" name="name" value="servicesBody">
                    <button class="btn btn-outline-primary" type="submit">Update</button>
                    <a href="javascript:void (0)" class="btn btn-outline-danger ml-2 sec-del-btn" data-target="sec_{{ $email->id }}">Delete</a>
                </div>
            </form>
            <form class="d-none" id="sec_{{ $email->id }}" method="post" action="{{ route('post.del.hm-sec') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $email->id }}">
            </form>
        </div>
    @endif
    @if ($phone)
        <div class="card card-body border-0 mb-4">
            <h4>Phone</h4>
        @foreach($phone as $phones)
            <form method="post" action="{{ route('post.sectionsHead') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="body" value="{{ $phones->body }}">
                    <input type="hidden" name="id" value="{{ $phones->id }}">
                    <input type="hidden" name="name" value="servicesBody">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                        <a href="javascript:void (0)" class="btn btn-outline-danger sec-del-btn" data-target="sec_{{ $phones->id }}">Delete</a>
                    </div>
                </div>
            </form>
                <form class="d-none" id="sec_{{ $phones->id }}" method="post" action="{{ route('post.del.hm-sec') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $phones->id }}">
                </form>
        @endforeach
        </div>
    @endif
    @if ($quickLinks)
        <div class="card card-body border-0 mb-4">
            <h4>Quick Links</h4>
            @foreach ($quickLinks as $links)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Link</label>
                        <input name="body" class="form-control" value="{{ $links->body }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Target</label>
                        <input name="input3" class="form-control" value="{{ $links->btn_target }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Type</label>
                        <input name="title" class="form-control" value="{{ $links->title }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $links->id }}">
                        <input type="hidden" name="name" value="servicesBody">
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                        <a href="javascript:void (0)" class="btn btn-outline-danger ml-2 sec-del-btn" data-target="sec_{{ $links->id }}">Delete</a>
                    </div>
                </form>
                <form class="d-none" id="sec_{{ $links->id }}" method="post" action="{{ route('post.del.hm-sec') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $links->id }}">
                </form>
            @endforeach
        </div>
    @endif
    <div class="card card-footer border-0"></div>
    @include('admin.includes.opt-add-edit')
@stop

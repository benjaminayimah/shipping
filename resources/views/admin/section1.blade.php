@extends('admin.sections-master')

@section('pageTitle')
    Sections 1
@stop
@section('home-section-body')
    <div class="card card-body border-0">
        <h3>Section 1</h3>
        <div>
            @if ($servicesHead)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <label>Title</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="title" value="{{ $servicesHead->title }}">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Sub Title 1</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="subTitle1" value="{{ $servicesHead->sub_title1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Sub Title 2</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="subTitle2" value="{{ $servicesHead->sub_title2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{ $servicesHead->id }}">
                        <input type="hidden" name="name" value="servicesHead">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                    </div>
                </form>
            @endif
            <h5>Services</h5>
                @if (count($services) > 0)
                    @foreach($services as $service)
                        <form method="post" action="{{ route('post.sectionsHead') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Content</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="input1" value="{{ $service->btn }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>icon </label><i class="{{ $service->icon }}"></i>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="input2" value="{{ $service->icon }}">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="id" value="{{ $service->id }}">
                                <input type="hidden" name="name" value="servicesBody">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                                <a href="javascript:void (0)" class="btn btn-outline-danger btn-sm ml-3 sec-del-btn" data-target="sec_{{ $service->id }}">Delete</a>
                            </div>
                        </form>
                        <form class="d-none" id="sec_{{ $service->id }}" method="post" action="{{ route('post.del.hm-sec') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $service->id }}">
                        </form>
                    @endforeach
                @endif
        </div>
    </div>
    <div class="card card-footer border-0"></div>
    @include('admin.includes.opt-add-edit')
@stop

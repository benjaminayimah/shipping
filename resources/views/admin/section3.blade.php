@extends('admin.sections-master')

@section('pageTitle')
    Sections 3
@stop
@section('home-section-body')
    <h3>Section 3 Header</h3>
    <div class="card card-body border-0 mb-4">
        <div>
            @if ($whychooseHead)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $whychooseHead->title }}">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Sub Title 1</label>
                                <input type="text" class="form-control" name="subTitle1" value="{{ $whychooseHead->sub_title1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Sub Title 2</label>
                                <input type="text" class="form-control" name="subTitle2" value="{{ $whychooseHead->sub_title2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $whychooseHead->id }}">
                        <input type="hidden" name="name" value="servicesHead">
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <h3>Why Chooose Use Body</h3>
    @if (count($WhyChooseBody) > 0)
        @foreach($WhyChooseBody as $gal)
            <div class="card card-body border-0 mb-3">
                <div class="gallery">
                    <div>
                        <img src="{{ asset('storage/'.$gal->image) }}" alt="{{ $gal->caption }}" width="300" height="200">
                    </div>
                </div>
                <form method="post" id="update_sec_{{ $gal->id }}" action="{{ route('post.sectionsHead') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <textarea name="body" class="form-control">{{ $gal->body }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Button</label>
                                <input name="input1" class="form-control" value="{{ $gal->btn }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Target</label>
                                <input name="input3" class="form-control" value="{{ $gal->btn_target }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Number</label>
                                <input name="title" class="form-control" value="{{ $gal->title }}">
                            </div>
                            <div class="input-group-prepend">
                                <input type="hidden" name="id" value="{{ $gal->id }}">
                                <input type="hidden" name="name" value="servicesBody">
                                <input type="hidden" name="image" value="{{ $gal->image }}">
                            </div>
                            <div class="form-group">
                                <label for="img">image:</label>
                                <input type="file" id="img" name="sectionImage" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-3">
                    <a href="javascript: void (0)" class="btn btn-outline-primary text-primary update-sec" data-target="update_sec_{{ $gal->id }}"><i class="zmdi zmdi-edit text-primary"></i> Update</a>
                    <a class="del-img btn btn-outline-danger text-danger" href="javascript: void (0)" data-target="del_img_{{ $gal->id }}"><i class="zmdi zmdi-delete text-danger"></i> Delete</a>
                    <form id="del_img_{{ $gal->id }}" method="post" action="{{ route('post.del.gallery') }}" class="d-none">
                        @csrf
                        <input type="hidden" name="inputId" value="{{ $gal->id }}">
                        <input type="hidden" name="image" value="{{ $gal->image }}">
                    </form>
                </div>
            </div>
        @endforeach
    @else
        No image available!!
    @endif
    <h3>Section 4 Header</h3>
    <div class="card card-body border-0 mb-4">
        <div>
            @if ($galleryHead)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $galleryHead->title }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Sub Title 1</label>
                        <input type="text" class="form-control" name="subTitle1" value="{{ $galleryHead->sub_title1 }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $galleryHead->id }}">
                        <input type="hidden" name="name" value="servicesHead">
                        <button class="btn btn-outline-primary" type="submit">Update</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <div class="card card-footer border-0"></div>
    @include('admin.includes.opt-add-edit')
@stop

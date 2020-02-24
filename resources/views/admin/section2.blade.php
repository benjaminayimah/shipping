@extends('admin.sections-master')

@section('pageTitle')
    Sections 2
@stop
@section('home-section-body')
    <div class="card card-body border-0">
        <h3>Section 2</h3>
        <div>
            @if ($aboutHead)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <label>Title</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="title" value="{{ $aboutHead->title }}">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Sub Title 1</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="subTitle1" value="{{ $aboutHead->sub_title1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Sub Title 2</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="subTitle2" value="{{ $aboutHead->sub_title2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{ $aboutHead->id }}">
                        <input type="hidden" name="name" value="servicesHead">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                    </div>
                </form>
            @endif
            <h5>Images</h5>
                @if (count($aboutImg) > 0)
                    @foreach($aboutImg as $gal)
                        <div class="gallery">
                            <div>
                                <img src="{{ asset('storage/'.$gal->image) }}" alt="{{ $gal->caption }}" width="300" height="200">
                            </div>
                            <div class="actions">
                                <a class="del-img" href="javascript: void (0)" data-target="del_img_{{ $gal->id }}"><i class="zmdi zmdi-delete text-danger"></i></a>
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
        </div>
        <div>
            @if ($WhoWeAre)
                <form method="post" action="{{ route('post.sectionsHead') }}">
                    @csrf
                    <label>who we are</label>
                    <div class="form-group">
                        <textarea class="form-control" name="body" rows="3">{{ $WhoWeAre->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $WhoWeAre->id }}">
                        <input type="hidden" name="name" value="servicesHead">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                    </div>
                </form>
            @endif
                @if ($vision)
                    <form method="post" action="{{ route('post.sectionsHead') }}">
                        @csrf
                        <label>Vision</label>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3">{{ $vision->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $vision->id }}">
                            <input type="hidden" name="name" value="servicesHead">
                            <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                        </div>
                    </form>
                @endif
                @if ($mission)
                    <form method="post" action="{{ route('post.sectionsHead') }}">
                        @csrf
                        <label>Mission</label>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3">{{ $mission->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $mission->id }}">
                            <input type="hidden" name="name" value="servicesHead">
                            <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                        </div>
                    </form>
                @endif
            @if ($coreValues)
                <h5>Core values</h5>
                @foreach($coreValues as $values)
                    <form method="post" action="{{ route('post.sectionsHead') }}">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="title" value="{{ $values->title }}">
                                <div class="input-group-prepend">
                                    <input type="hidden" name="id" value="{{ $values->id }}">
                                    <input type="hidden" name="name" value="servicesHead">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                    <a class="sec-del-btn btn btn-outline-danger" href="javascript: void (0)" data-target="del_coreval{{ $values->id }}">Delete</a>
                                </div>
                            </div>
                        </div>
                    </form>
                        <form id="del_coreval{{ $values->id }}" method="post" action="{{ route('post.del.hm-sec') }}" class="d-none">
                            @csrf
                            <input type="hidden" name="id" value="{{ $values->id }}">
                        </form>
                    @endforeach
            @endif
        </div>
    </div>
    <div class="card card-footer border-0"></div>
    @include('admin.includes.opt-add-edit')
@stop

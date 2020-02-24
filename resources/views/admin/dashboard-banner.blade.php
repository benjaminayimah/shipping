@extends('layouts.admin')
@section('title')
    Dashboard | Banner
@stop
@section('pageTitle')
    Banner
@stop

@section('titlemain')
    <!--<li class="breadcrumb-item"><a href="">Shipments</a></li>-->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0 pd-r-0 pd-l-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Banner Section</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($banner) > 0)
                        @foreach($banner as $ban)
                            <div class="banner">
                                <form method="post" action="{{ route('post.banner.status') }}" id="gal_status_{{ $ban->id }}" class="gal-status-form" data-target="featured_{{ $ban->id }}" >
                                    @csrf
                                    <input  name="featured" id="featured_{{ $ban->id }}" class="gal-status-toggle" @if($ban->status == '1') checked @endif type="checkbox">
                                    <input type="hidden" name="id" value="{{ $ban->id  }}">
                                </form>
                                <div>
                                    <img src="{{ asset('storage/'.$ban->image) }}" alt="{{ $ban->caption }}">
                                </div>
                                <div class="desc">
                                    <div>{{ $ban->caption }}</div>
                                    @if ($ban->sub_caption1)
                                        <div>{{ $ban->sub_caption1 }}</div>
                                    @endif
                                    @if ($ban->btn)
                                        <div><button class="btn rounded">{{ $ban->btn }}</button></div>
                                    @endif
                                    @if ($ban->btn_target)
                                        <div>{{ $ban->btn_target }}</div>
                                    @endif
                                </div>
                                <div class="actions">
                                    <a href="javascript: void (0)" class="edit-banner" data-id="{{ $ban->id }}" data-image="{{ $ban->image }}" data-title="{{ $ban->caption }}" data-sub1="{{ $ban->sub_caption1 }}" data-sub2="{{ $ban->btn }}" data-sub3="{{ $ban->btn_target }}"><i class="zmdi zmdi-edit text-primary"></i></a>
                                    <a class="del-img" href="javascript: void (0)" data-target="del_img_{{ $ban->id }}"><i class="zmdi zmdi-delete text-danger"></i></a>
                                    <form id="del_img_{{ $ban->id }}" method="post" action="{{ route('post.del.gallery') }}" class="d-none">
                                        @csrf
                                        <input type="hidden" name="inputId" value="{{ $ban->id }}">
                                        <input type="hidden" name="image" value="{{ $ban->image }}">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No image available!!
                    @endif
                </div>
                <div class="card-footer border-0">
                    @if ($banner)
                        <div>{{ $banner->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Social traffic</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" id="gallery_uploadform" style="width: 100%;" action="{{ route('post.admin.gallery') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Caption 1:</label>
                            <input type="text" class="form-control" id="caption1" name="caption1" value="{{ old('caption1') }}" placeholder="caption 1">
                        </div>
                        <div class="form-group">
                            <label for="title">Caption 2:</label>
                            <input type="text" class="form-control" id="caption2" name="caption2" value="{{ old('caption2') }}" placeholder="caption 2">
                        </div>
                        <div class="form-group">
                            <label for="title">Button:</label>
                            <input type="text" class="form-control" id="imgButton" name="imgButton" value="{{ old('imgButton') }}" placeholder="Button">
                        </div>
                        <div class="form-group">
                            <label for="title">Target:</label>
                            <input type="text" class="form-control" id="btnTarget" name="btnTarget" value="{{ old('btnTarget') }}" placeholder="Button target">
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="type" value="banner">
                            <label for="img">Choose image:</label>
                            <input type="file" id="BannerImg" name="BannerImg" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>

                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" id="myEditBanner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="zmdi zmdi-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="gallery_uploadform" style="width: 100%;" action="{{ route('post.edit.gallery') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="title">Caption 1:</label>
                                    <input type="text" class="form-control" id="caption1Edit" name="title">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">Caption 2:</label>
                                    <input type="text" class="form-control" id="caption2Edit" name="caption2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="title">Button:</label>
                                    <input type="text" class="form-control" id="ButtonEdit" name="button">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">Target:</label>
                                    <input type="text" class="form-control" id="target" name="target">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="type" value="banner">
                            <input type="hidden" name="inputId" id="inputEditId">
                            <input type="hidden" name="imgGalOld" id="imgOld">
                            <label for="img">Choose image:</label>
                            <input type="file" name="galleryImg" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



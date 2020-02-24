@extends('layouts.admin')
@section('title')
    Dashboard | Media gallery
@stop
@section('pageTitle')
    Gellery
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
                            <h3 class="mb-0">Media Gallery</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($gallery) > 0)
                        @foreach($gallery as $gal)
                            <div class="gallery">
                                <form method="post" action="{{ route('post.gall.status') }}" id="gal_status_{{ $gal->id }}" class="gal-status-form" data-target="featured_{{ $gal->id }}" >
                                    @csrf
                                    <input  name="featured" id="featured_{{ $gal->id }}" class="gal-status-toggle" @if($gal->status == '1') checked @endif type="checkbox">
                                    <input type="hidden" name="id" value="{{ $gal->id  }}">
                                </form>
                                <div>
                                    <img src="{{ asset('storage/'.$gal->image) }}" alt="{{ $gal->caption }}" width="300" height="200">
                                </div>
                                <div class="desc">
                                    <div>{{ $gal->caption }}</div>
                                    @if ($gal->sub_caption1)
                                        <div>{{ $gal->sub_caption1 }}</div>
                                    @endif
                                    @if ($gal->sub_caption2)
                                        <div>{{ $gal->sub_caption2 }}</div>
                                    @endif
                                    @if ($gal->sub_caption3)
                                        <div>{{ $gal->sub_caption3 }}</div>
                                    @endif
                                </div>
                                <div class="actions">
                                    <a href="javascript: void (0)" class="edit-gal" data-id="{{ $gal->id }}"  data-image="{{ $gal->image }}" data-title="{{ $gal->caption }}" data-sub1="{{ $gal->sub_caption1 }}" data-sub2="{{ $gal->sub_caption2 }}" data-sub3="{{ $gal->sub_caption3 }}"><i class="zmdi zmdi-edit text-primary"></i></a>
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
                <div class="card-footer border-0">
                    @if ($gallery)
                        <div>{{ $gallery->links() }}</div>
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
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="title">1st Sub title:</label>
                            <input type="text" class="form-control" id="subTitle1" name="subTitle1" value="{{ old('subTitle1') }}" placeholder="Sub title">
                        </div>
                        <div class="form-group">
                            <label for="title">2nd Sub title:</label>
                            <input type="text" class="form-control" id="subTitle2" name="subTitle2" value="{{ old('subTitle2') }}" placeholder="Sub title 2">
                        </div>
                        <div class="form-group">
                            <label for="title">3rd Sub title:</label>
                            <input type="text" class="form-control" id="subTitle3" name="subTitle3" value="{{ old('subTitle3') }}" placeholder="Sub title 3">
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="type" value="gallery">
                            <label for="img">Choose image:</label>
                            <input type="file" id="galleryImg" name="galleryImg" class="form-control">
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
    <div class="modal fade" id="myEditGal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" id="titleEdit" name="title">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">1st Sub title:</label>
                                    <input type="text" class="form-control" id="subTitle1Edit" name="subTitle1">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="title">2nd Sub title:</label>
                                    <input type="text" class="form-control" id="subTitle2Edit" name="subTitle2">
                                </div>
                                <div class="col-sm-6">
                                    <label for="title">3rd Sub title:</label>
                                    <input type="text" class="form-control" id="subTitle3Edit" name="subTitle3">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" name="type" value="gallery">
                            <input type="hidden" name="inputId" id="inputEditId">
                            <input type="hidden" name="imgGalOld" id="imgGalOld">
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



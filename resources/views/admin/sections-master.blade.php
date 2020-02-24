@extends('layouts.admin')
@section('title')
    Dashboard | Sections insert
@stop
@section('pageTitle')
    Sections
@stop

@section('titlemain')
    <!--<li class="breadcrumb-item"><a href="">Shipments</a></li>-->
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-8 mb-5 pd-r-0 pd-l-0">
                <div class="card card-header shadow border-r6 border-0 mb-4">
                    <div class="row align-items-center" style="margin: 0">
                        <form method="post" id="book_uploadform" style="width: 100%;" action="{{ route('post.sections') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <label for="section">Section:</label>
                                <select name="section" id="section" class="form-control">
                                    <option selected value="">Select section</option>
                                    @if (count($options) > 0)
                                        @foreach($options as $option)
                                            <?php
                                            $key = preg_replace('#[^a-z0-9]#i', '', $option->value);
                                            ?>
                                            <option value="{{ $key }}">{{ $option->value }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-row" style="display: flex; flex-wrap: wrap">
                                <div class="form-group col-md-6">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subTitle1">Sub Title 1:</label>
                                    <input type="text" class="form-control" id="subTitle1" name="subTitle1" value="{{ old('subTitle1') }}">
                                </div>
                            </div>
                            <div class="form-row" style="display: flex; flex-wrap: wrap">
                                <div class="form-group col-md-6">
                                    <label for="subTitle2">Sub Title 2:</label>
                                    <input type="text" class="form-control" id="subTitle2" name="subTitle2" value="{{ old('subTitle2') }}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subTitle3">Sub Title 3:</label>
                                    <input type="text" class="form-control" id="subTitle3" name="subTitle3" value="{{ old('subTitle3') }}">
                                </div>
                            </div>
                            <div class="form-row" style="display: flex; flex-wrap: wrap;">
                                <div class="form-group col-md-4">
                                    <label for="mainBody">Main body:</label>
                                    <textarea name="mainBody" class="form-control" rows="5" id="mainBody">{{ old('mainBody') }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="button">Button:</label>
                                        <input type="text" class="form-control" id="button" name="button" value="{{ old('button') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="buttonTarget">Button target:</label>
                                        <input type="text" class="form-control" id="buttonTarget" name="buttonTarget" value="{{ old('buttonTarget') }}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="buttonTarget">Icon:</label>
                                        <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="img">image:</label>
                                        <input type="file" id="img" name="sectionImage" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="form-row" style="padding-top: 10px; margin: 0">
                                <div class="form-group w-100">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @yield('home-section-body')
        </div>
        <div class="col-xl-4">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Sections</h5>
                        </div>
                        <div class="col text-right">
                            <a href="javascript: void (0)" data-id="111" data-title="Sections" class="add-opt-btn"><small><strong><i class="zmdi zmdi-plus"></i> Add new</strong></small></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush option-table">
                        <tbody>
                        @if (count($options) > 0)
                            @foreach($options as $option)
                                <tr>
                                    <td>
                                        {{ $option->value }}
                                    </td>
                                    <td>
                                        <div class="pull-right">
                                            <form id="del_opt_form_{{ $option->id }}" method="post" action="{{ route('post.del.opt') }}">
                                                @csrf
                                                <input type="hidden" name="dataID" value="{{ $option->id }}">
                                            </form>
                                            <a href="javascript: void (0)" class="edit-opt" data-id="{{ $option->id }}" data-content="{{ $option->value }}"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript: void (0)" class="del-opt" data-target="del_opt_form_{{ $option->id }}"><i class="zmdi zmdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            No item available
                        @endif
                        </tbody>
                    </table>
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
                        <div class="form-group custom-control custom-checkbox">
                            <input class="custom-control-input" name="featured" id="featured" type="checkbox">
                            <label class="custom-control-label" for="featured">
                                <span>Featured?</span>
                            </label>
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



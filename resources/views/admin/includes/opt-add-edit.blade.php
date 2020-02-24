<div class="modal fade" id="myEditopt_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="zmdi zmdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false">
                    <div class="">
                        <div class="form-group" id="opt_input"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="editOptBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModaltitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="zmdi zmdi-close"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('post.option') }}">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <input type="text" name="contentInput" class="form-control"/>
                            <input type="hidden" name="type" id="addHiddenInput" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

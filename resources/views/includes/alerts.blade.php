<div class="my-alerts-holder">
    @if (session('status'))
        <div id="alert" class="alert alert-success alert-flash alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="zmdi zmdi-close"></span>
            </button>
            {{ session('status') }}
        </div>
    @endif
    @if (session('status2'))
        <div class="alert alert-danger alert-dismissible show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="zmdi zmdi-close"></span>
            </button>
            {{ session('status2') }}
        </div>
    @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible show" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="zmdi zmdi-close"></span>
                </button>
            </div>
        @endif
</div>


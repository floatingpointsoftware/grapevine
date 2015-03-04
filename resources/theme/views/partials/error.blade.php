@if (Session::has('error'))
    <div class="row">
        <div class="col-sm-8">
            <div class="alert alert-danger" role="alert">
                <p>Ooops! {!! Session::get('error') !!}</p>
            </div>
        </div>
    </div>
@endif
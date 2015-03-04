@section('main')
    {!! Form::open(['route' => 'login.submit']) !!}
        <div class="row">
            <h2>Login</h2>
        </div>

        @include('partials.error')

        <div class="form-horizontal row">
            <div class="form-group">
                {!! Form::label('email', null, ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'email'])
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('password', null, ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'password'])
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember') !!} Remember me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

                    <span class="login-link">or <a href="{!! route('register.form') !!}">register</a></span>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('main')
    {!! Form::open(['route' => 'register.submit']) !!}
        <div class="row">
            <h1>Registration</h1>
        </div>

        @include('partials.error')

        <div class="form-horizontal row">
            <div class="form-group">
                {!! Form::label('username', null, ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'username'])
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email', null, ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'email'])
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('email_confirmation', 'Confirm', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email_confirmation', null, ['placeholder' => 'Confirm email entered above', 'class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'email_confirmation'])
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
                {!! Form::label('password_confirmation', null, ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::password('password_confirmation', ['placeholder' => 'Confirm password entered above', 'class' => 'form-control']) !!}
                    @include('partials.field-error', ['field' => 'password'])
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}

                    <span class="login-link">or <a href="{!! route('register.form') !!}">login</a></span>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('main')
    {!! Form::open(['route' => 'register.submit']) !!}
        <div class="row">
            <h2 class="control-heading">
                Identity
            </h2>

            <div class="control">
                <div class="control-label">
                    {!! Form::label('username') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::text('username') !!}
                    @include('partials.field-error', ['field' => 'username'])
                </div>
            </div>

            <h2 class="control-heading">
                Credentials
            </h2>

            <div class="control">
                <div class="control-label">
                    {!! Form::label('email') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::email('email') !!}
                    @include('partials.field-error', ['field' => 'email'])
                </div>
            </div>

            <div class="control">
                <div class="control-label">
                    {!! Form::label('email_confirmation') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::email('email_confirmation') !!}
                    @include('partials.field-error', ['field' => 'email_confirmation'])
                </div>
            </div>

            <div class="control">
                <div class="control-label">
                    {!! Form::label('password') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::password('password') !!}
                    @include('partials.field-error', ['field' => 'password'])
                </div>
            </div>

            <div class="control">
                <div class="control-label">
                    {!! Form::label('password_confirmation') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::password('password_confirmation') !!}
                    @include('partials.field-error', ['field' => 'password_confirmation'])
                </div>
            </div>

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Register') !!}

                    <a href="{!! route('login.form') !!}" class="login-link">Or Log in</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

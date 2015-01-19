@section('main')
    {!! Form::open(['route' => 'login.submit']) !!}
        @if (Session::has('error'))
            <div class="single-error">
                {!! Session::get('error') !!}
            </div>
        @endif

        <div class="row">
            <h2 class="control-heading">
                Login
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
                    {!! Form::label('password') !!}
                </div>
                <div class="control-field column-two-thirds">
                    {!! Form::password('password') !!}
                    @include('partials.field-error', ['field' => 'password'])
                </div>
            </div>

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Login') !!}

                    <a href="{!! route('register.form') !!}" class="login-link">Or Register</a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

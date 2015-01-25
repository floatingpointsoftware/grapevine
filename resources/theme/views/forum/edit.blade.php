@section('main')
    {!! Form::model($forum, ['route' => 'register.submit']) !!}
        <div class="row">
            <h2 class="control-heading">
                Edit forum
            </h2>

            @include('forum.form')

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Update') !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
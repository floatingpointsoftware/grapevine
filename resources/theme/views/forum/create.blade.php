@section('main')
    {!! Form::model($forum, ['route' => 'forum.store']) !!}
        <div class="row">
            <h2 class="control-heading">
                Create forum
            </h2>

            @include('forum.form')

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Create') !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
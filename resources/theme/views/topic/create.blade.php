@section('main')
    {!! Form::model($topic, ['route' => ['topics.store']]) !!}
    <div class="row">
        <h2 class="control-heading">
            Create new topic in {{ $topic->category->title }}
        </h2>

        @include('topic.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Create') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

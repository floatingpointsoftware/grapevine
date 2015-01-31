@section('main')
    {!! Form::model($topic, ['route' => ['forum.topics.store', $topic->forum->slug]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Create new topic in {{ $topic->forum->title }}
        </h2>

        @include('forum.topics.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Create') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('main')
    {!! Form::model($topic, ['method' => 'PUT', 'route' => ['forum.topics.update', $topic->forum->slug, $topic->slug]]) !!}
    {!! Form::hidden('topic_slug', $topic->slug) !!}
    <div class="row">
        <h2 class="control-heading">
            Update {{ $topic->forum->title }}
        </h2>

        @include('forum.topics.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Update') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

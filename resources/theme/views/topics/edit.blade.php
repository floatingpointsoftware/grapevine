@section('main')
    {!! Form::model($topic, ['method' => 'PUT', 'route' => ['category.topics.update', $topic->category->slug, $topic->slug]]) !!}
    {!! Form::hidden('topic_slug', $topic->slug) !!}
    <div class="row">
        <h2 class="control-heading">
            Update {{ $topic->category->title }}
        </h2>

        @include('category.topics.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Update') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

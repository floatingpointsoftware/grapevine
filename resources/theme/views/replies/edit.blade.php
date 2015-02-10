@section('main')
    {!! Form::model($reply, ['method' => 'PUT', 'route' => ['category.topics.replies.update', $topic->category->slug, $topic->slug, $reply->id]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Update my reply to {{ $reply->topic->title }}
        </h2>

        @include('category.topics.replies.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Update') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

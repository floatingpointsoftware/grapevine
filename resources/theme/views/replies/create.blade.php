@section('main')
    {!! Form::model($reply, ['route' => ['topics.replies.store', $topic->slug]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Reply to {{ $reply->topic->title }}
        </h2>

        @include('replies.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Create') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

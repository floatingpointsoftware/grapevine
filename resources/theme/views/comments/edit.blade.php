@section('main')
    {!! Form::model($reply, ['method' => 'PUT', 'route' => ['discussions.replies.update', $discussion->slug, $reply->id]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Update my reply to {{ $reply->discussion->title }}
        </h2>

        @include('replies.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Update') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

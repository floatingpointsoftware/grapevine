@section('main')
    {!! Form::model($reply, ['route' => ['discussions.replies.store', $discussion->slug]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Reply to {{ $reply->discussion->title }}
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

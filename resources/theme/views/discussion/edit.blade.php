@section('main')
    {!! Form::model($discussion, ['method' => 'PUT', 'route' => ['category.discussions.update', $discussion->category->slug, $discussion->slug]]) !!}
    {!! Form::hidden('discussion_slug', $discussion->slug) !!}
    <div class="row">
        <h2 class="control-heading">
            Update {{ $discussion->category->title }}
        </h2>

        @include('category.discussions.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Update') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

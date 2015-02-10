@section('main')
    {!! Form::model($topic, ['route' => ['category.topics.store', $topic->category->slug]]) !!}
    <div class="row">
        <h2 class="control-heading">
            Create new topic in {{ $topic->category->title }}
        </h2>

        @include('category.topics.form')

        <div class="form-actions">
            <div class="control-field column-two-thirds">
                {!! Form::submit('Create') !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

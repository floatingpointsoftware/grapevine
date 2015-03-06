@section('main')
    {!! Form::model($discussion, ['route' => ['discussion.store']]) !!}
    <div class="row">
        <div class="page-header">
            <h1>Start a new discussion @if (isset($category)) in {{ $category->title }}@endif</h1>
        </div>

        @include('partials.error')
        @include('discussion.form')

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                {!! Form::submit('Start discussion', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('main')
    {!! Form::model($category, ['route' => 'category.store', 'class' => 'form-horizontal']) !!}
        <div class="page-header">
            <h1>Setup category</h1>
        </div>

        @include('category.form')

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Setup', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop

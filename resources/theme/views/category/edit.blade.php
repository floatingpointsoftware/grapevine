@section('main')
    {!! Form::model($category, ['route' => 'category.update', 'class' => 'form-horizontal']) !!}
        <div class="page-header">
            <h1>Edit category</h1>
        </div>

        @include('category.form')

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop
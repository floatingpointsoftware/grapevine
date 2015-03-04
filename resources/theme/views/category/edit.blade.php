@section('main')
<<<<<<< HEAD
    {!! Form::model($category, ['route' => 'category.update', 'class' => 'form-horizontal']) !!}
        <div class="page-header">
            <h1>Edit category</h1>
        </div>

        @include('category.form')
=======
    {!! Form::model($category, ['method' => 'PUT', 'route' => ['category.update', $category->slug]]) !!}
        <div class="row">
            <h2 class="control-heading">
                Edit category
            </h2>

            @include('category.form')
            {!! Form::hidden('id', $category->id) !!}
>>>>>>> fa2e1d7cd45fee62b1ff484311c8304f72b07a21

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Save', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop

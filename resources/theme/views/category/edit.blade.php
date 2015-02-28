@section('main')
    {!! Form::model($category, ['method' => 'PUT', 'route' => ['category.update', $category->slug]]) !!}
        <div class="row">
            <h2 class="control-heading">
                Edit category
            </h2>

            @include('category.form')
            {!! Form::hidden('id', $category->id) !!}

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Update') !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

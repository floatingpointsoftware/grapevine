@section('main')
    {!! Form::model($category, ['route' => 'register.submit']) !!}
        <div class="row">
            <h2 class="control-heading">
                Edit category
            </h2>

            @include('category.form')

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Update') !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
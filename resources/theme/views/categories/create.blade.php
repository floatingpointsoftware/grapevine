@section('main')
    {!! Form::model($category, ['route' => 'category.store']) !!}
        <div class="row">
            <h2 class="control-heading">
                Create category
            </h2>

            @include('category.form')

            <div class="form-actions">
                <div class="control-field column-two-thirds">
                    {!! Form::submit('Create') !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop
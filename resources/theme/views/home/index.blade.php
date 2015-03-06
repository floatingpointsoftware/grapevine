@section('main')
    <p>It's looking pretty quiet here. Let's get a dialog going.</p>
    <br>
    @if ($categoryCount < 1)
        <div class="buttons">
            <a class="btn btn-default btn-lg" href="{!! route('category.create') !!}" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Setup category
            </a>
        </div>
    @else
        <div class="buttons">
            <a class="btn btn-default btn-lg" href="{!! route('category.create') !!}" role="button">
                Start a Discussion
            </a>
        </div>
    @endif
@stop

<div class="form-horizontal row">
    @if (count($categories) && !isset($category))
        <div class="form-group">
            {!! Form::label('category', 'Category', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-8">
                {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                @include('partials.field-error', ['field' => 'category'])
            </div>
        </div>
    @else
        {!! Form::hidden('category', $category->id) !!}
    @endif

    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-8">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @include('partials.field-error', ['field' => 'title'])
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            @include('partials.field-error', ['field' => 'comment'])
        </div>
    </div>
</div>
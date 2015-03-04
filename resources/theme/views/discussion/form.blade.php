<div class="form-horizontal row">
    @if (count($categories) && !isset($category))
        <div class="form-group">
            {!! Form::label('category_id', 'Category', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-8">
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                @include('partials.field-error', ['field' => 'category_id'])
            </div>
        </div>
    @else
        {!! Form::hidden('category_id', $category->id) !!}
    @endif

    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-8">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @include('partials.field-error', ['field' => 'title'])
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Comment', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            @include('partials.field-error', ['field' => 'comment'])
        </div>
    </div>
</div>
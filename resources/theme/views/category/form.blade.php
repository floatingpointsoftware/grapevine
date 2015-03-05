@if (isset($categories) && count($categories) > 1)
    <div class="form-group">
        {!! Form::label('parent_id', 'Parent', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-10">
            {!! Form::select('parent_id', $categories, null, ['class' => 'form-control']) !!}
            @include('partials.field-error', ['field' => 'parent_id'])
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @include('partials.field-error', ['field' => 'title'])
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('description', null, ['placeholder' => 'Optional', 'class' => 'form-control']) !!}
        @include('partials.field-error', ['field' => 'title'])
    </div>
</div>

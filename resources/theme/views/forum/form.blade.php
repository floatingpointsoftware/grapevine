@if (count($forums) > 1)
    <div class="control">
        <div class="control-label">
            {!! Form::label('parent_id', 'Parent') !!}
        </div>
        <div class="control-field column-two-thirds">
            {!! Form::select('parent_id', $forums) !!}
            @include('partials.field-error', ['field' => 'title'])
        </div>
    </div>
@endif

<div class="control">
    <div class="control-label">
        {!! Form::label('title') !!}
    </div>
    <div class="control-field column-two-thirds">
        {!! Form::text('title') !!}
        @include('partials.field-error', ['field' => 'title'])
    </div>
</div>

<div class="control">
    <div class="control-label">
        {!! Form::label('description') !!}
    </div>
    <div class="control-field column-two-thirds">
        {!! Form::textarea('description') !!}
        @include('partials.field-error', ['field' => 'description'])
    </div>
</div>
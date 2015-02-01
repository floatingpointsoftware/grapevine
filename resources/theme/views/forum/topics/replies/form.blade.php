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
        {!! Form::label('content') !!}
    </div>
    <div class="control-field column-two-thirds">
        {!! Form::textarea('content') !!}
        @include('partials.field-error', ['field' => 'description'])
    </div>
</div>

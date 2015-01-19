@if ($errors->has($field))
    <div class="field-errors">
        @foreach ($errors->get($field) as $error)
            <div class="field-error">{!! $error !!}</div>
        @endforeach
    </div>
@endif

<div class="component welcome">
    <header>
        <h1 class="h4">WELCOME, {!! Auth::user()->username !!}!</h1>
    </header>

    <div class="buttons">
        <a class="btn btn-default" href="{!! route('register.form') !!}" role="button">Start discussion</a>
    </div>
</div>

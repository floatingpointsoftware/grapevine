<div class="component welcome">
    <header>
        <h1 class="h4">WELCOME, {!! Auth::user()->username !!}!</h1>
    </header>

    <div class="buttons">
        <a class="btn btn-default" href="{{ $link->discussion->start() }}" role="button">Start discussion</a>
    </div>
</div>

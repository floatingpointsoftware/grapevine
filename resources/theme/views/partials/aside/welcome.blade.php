<div class="component welcome">
    <header>
        <h1 class="h4">WELCOME, STRANGER!</h1>
    </header>

    <p>
        It looks like you're new here. If you want to get involved, click one of these buttons!
    </p>

    <div class="buttons">
        <a class="btn btn-default" href="{!! $link->register() !!}" role="button">Register</a>
        <a class="btn btn-default" href="{!! $link->login() !!}" role="button">Sign in</a>
    </div>
</div>

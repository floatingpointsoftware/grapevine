@if (Auth::guest())
    @include('partials.aside.welcome')
@endif

@include('partials.aside.featured')
@include('partials.aside.categories')

@if (Auth::guest())
    @include('partials.aside.welcome')
@else
    @include('partials.aside.member')
@endif

@include('partials.aside.featured')
@include('partials.aside.categories')

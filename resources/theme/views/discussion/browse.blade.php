@section('main')
    <div class="row">
        @if ($discussions->count())
            <ul class="discussions">
                @foreach ($discussions as $discussion)
                    <li>
                        <div class="avatar">
                            {!! HTML::avatar($discussion->user) !!}
                        </div>
                        <div class="content"></div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="page-header">
                <h1>{{ $category->title }}</h1>
            </div>

            <p>It's looking pretty quiet here in {{ $category->title }}. Let's get a dialog going.</p>
            <br>
            <p><a href="{!! route('discussion.create.with', [$category->slug]) !!}" class="btn btn-default btn-lg">Start a discussion.</a></p>
        @endif
    </div>
@endsection
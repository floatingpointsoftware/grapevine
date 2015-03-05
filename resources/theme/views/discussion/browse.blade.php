@section('main')
    <div class="row">
        @if ($discussions->count())
            <ul class="discussions">
                @foreach ($discussions as $discussion)
                    <li>
                        <div class="avatar">
                            {!! HTML::avatar($discussion->user) !!}
                        </div>
                        <article>
                            <header>
                                <h1 class="h2 normalize">{{ $discussion->title }}</h1>
                            </header>
                            <footer>
                                <a href="{{ route('discussion.browse', [$discussion->category]) }}">{!! HTML::label($discussion->category->title, $discussion->category->slug) !!}</a>
                                <span class="soft">Updated <strong>{{ $discussion->updatedAt->diffForHumans() }}</strong> by {{ $discussion->updatedBy }}</span>
                            </footer>
                        </article>
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
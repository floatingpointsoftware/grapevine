@section('main')
    <div class="row discussions">
        <div class="col-sm-2">
            <div class="avatar">
                {!! HTML::avatar($discussion->user) !!}
            </div>
        </div>

        <div class="col-sm-10">
            <article>
                <header class="page-header">
                    <h1 class="normalize">{{ $discussion->title }}</h1>
                </header>

                <div>
                    {{ HTML::markdown($discussion->body) }}
                </div>

                <footer>
                    <p></p>
                </footer>
            </article>
        </div>
    </div>

    @if ($discussion->comments->count() < 1)
        <h3 class="text-center">No replies yet</h3>
    @else
        <p>{{ $discussion->comment_count }} replies, {{ $discussion->views }} views</p>
        @foreach ($discussion->comments as $comment)
            <div class="row">
                <div class="col-md-8">
                    {{ $comment->content }}
                </div>
                <div class="col-md-4">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['comment.destroy', $discussion->slug, $reply->id]]) !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                    {!! HTML::linkRoute('discussions.replies.edit', 'Edit', [$discussion->slug, $reply->id]) !!}
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
    <div class="row">
        <div class="col-md-12">
            {!! HTML::linkRoute('comment.create', 'Comment', [$discussion->slug]) !!}
        </div>
    </div>
@stop

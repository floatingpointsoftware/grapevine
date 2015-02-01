@section('main')
    <div class="row">
        <h1 class="text-center">{{ $forum->title }}</h1>
    </div>
    @if($forum->children->count() < 1)
        <h3 class="text-center">No Topics Created Yet!</h3>
    @else
        @foreach($forum->children as $topic)
            <div class="row">
                <div class="col-md-3">{!! HTML::linkRoute('forum.topics.show', $topic->title, [$topic->forum->slug, $topic->slug]) !!}</div>
                <div class="col-md-3">{{ $topic->replies_count }} replies, {{ $topic->views }} views</div>
                <div class="col-md-3">Created {{ $topic->createdAt->toDayDateTimeString() }}</div>
                <div class="col-md-3">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['forum.topics.destroy', $forum->slug, $topic->slug]]) !!}

                        {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
    {!! HTML::linkRoute('forum.topics.create', 'New Topic', [$forum->slug]) !!}
@stop

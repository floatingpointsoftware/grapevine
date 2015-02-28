@section('main')
    <div class="row">
        <h1 class="text-center">{{ $topic->title }}</h1>
    </div>
    @if($topic->replies->count() < 1)
        <h3 class="text-center">No replies yet</h3>
    @else
        <p>{{ $topic->replies_count }} replies, {{ $topic->views }} views</p>
        @foreach($topic->replies as $reply)
            <div class="row">
                <div class="col-md-8">
                    {{ $reply->content }}
                </div>
                <div class="col-md-4">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['topics.replies.destroy', $topic->category->slug, $topic->slug, $reply->id]]) !!}
                    {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                    {!! HTML::linkRoute('topics.replies.edit', 'Edit', [$topic->category->slug, $topic->slug, $reply->id]) !!}
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
    <div class="row">
        <div class="col-md-12">
            {!! HTML::linkRoute('topics.replies.create', 'Reply', [$topic->slug]) !!}
        </div>
    </div>
@stop

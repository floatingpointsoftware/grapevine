@section('main')
    <div class="row">
        <h1 class="text-center">{{ $forum->title }}</h1>
    </div>
    @if($forum->children->count() < 1)
        <h3 class="text-center">No Topics Created Yet!</h3>
    @else
        @foreach($forum->children as $topic)
            <div class="row">
                <div class="col-md-12">{{ $topic->title }}</div>
            </div>
        @endforeach
    @endif
    {!! HTML::linkRoute('forum.topics.create', 'New Topic', [$forum->slug]) !!}
@stop

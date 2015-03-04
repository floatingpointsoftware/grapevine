@section('main')
    <div class="row">
        <h1>{{ $category->title }}</h1>
    </div>
    @if($category->children->count() < 1)
        <h3>No Discussions Created Yet!</h3>
    @else
        @foreach($category->children as $discussion)
            <div class="row">
                <div class="col-md-3">{!! HTML::linkRoute('discussions.show', $discussion->title, [$discussion->slug]) !!}</div>
                <div class="col-md-3">{{ $discussion->replies_count }} replies, {{ $discussion->views }} views</div>
                <div class="col-md-3">Created {{ $discussion->createdAt->toDayDateTimeString() }}</div>
                <div class="col-md-3">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['discussions.destroy', $discussion->slug]]) !!}
                        {!! Form::hidden('slug', $category->slug) !!}
                        {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                    {!! HTML::linkRoute('discussions.edit', 'Edit', [$discussion->category->slug, $discussion->slug]) !!}
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
    {!! HTML::linkRoute('discussions.create', 'New Discussion', 'category='.$category->slug) !!}
@stop

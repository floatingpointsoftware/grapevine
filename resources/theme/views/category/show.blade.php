@section('main')
    <div class="row">
        <h1>{{ $category->title }}</h1>
    </div>
    @if($category->children->count() < 1)
        <h3>No Topics Created Yet!</h3>
    @else
        @foreach($category->children as $topic)
            <div class="row">
                <div class="col-md-3">{!! HTML::linkRoute('topics.show', $topic->title, [$topic->slug]) !!}</div>
                <div class="col-md-3">{{ $topic->replies_count }} replies, {{ $topic->views }} views</div>
                <div class="col-md-3">Created {{ $topic->createdAt->toDayDateTimeString() }}</div>
                <div class="col-md-3">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['topics.destroy', $topic->slug]]) !!}
                        {!! Form::hidden('slug', $category->slug) !!}
                        {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                    {!! HTML::linkRoute('topics.edit', 'Edit', [$topic->category->slug, $topic->slug]) !!}
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
    {!! HTML::linkRoute('topics.create', 'New Topic', 'category='.$category->slug) !!}
@stop

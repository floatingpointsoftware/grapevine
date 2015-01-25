@section('main')
    <div class="row forums">
        @forelse ($forums as $forum)
            <div class="forum">
                <header>
                    <h2>{!! $forum->title !!}</h2>
                    <div class="buttons">
                        {!! HTML::linkRoute('forum.edit', 'Edit', [$forum->slug], ['class' => 'button']) !!}
                        {!! HTML::linkRoute('forum.destroy', 'Delete', [$forum->slug], ['class' => 'button']) !!}
                    </div>
                </header>
                @if ($forum->description)
                    <footer>
                        <p>{!! $forum->description !!}</p>
                    </footer>
                @endif
            </div>
        @empty
            There are currently no forums configured. {!! HTML::linkRoute('forum.create', 'Create your first forum') !!}
        @endforelse
    </div>
@stop

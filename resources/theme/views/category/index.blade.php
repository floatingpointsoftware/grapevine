@section('main')
    <div class="row categories">
        @forelse ($categories as $category)
            <div class="category">
                <header>
                    <h2>{!! HTML::linkRoute('category.show', $category->title, [$category->slug]) !!}</h2>
                    <div class="buttons">
                        {!! HTML::linkRoute('category.edit', 'Edit', [$category->slug], ['class' => 'button']) !!}
                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->slug]]) !!}
                            {!! Form::submit('Delete', ['class' => 'button']) !!}
                        {!! Form::close() !!}
                    </div>
                </header>
                    <footer>
                        @if ($category->description)
                            <p>{!! $category->description !!}</p>
                        @endif

                        <p>{{ $category->discussion_count . ' discussions, ' . $category->replies_count . ' replies' }}</p>
                    </footer>
            </div>
        @empty
            There are currently no categories configured. {!! HTML::linkRoute('category.create', 'Create your first category') !!}
        @endforelse
    </div>
@stop

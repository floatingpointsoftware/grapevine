@section('main')
    <div class="row categories">
        @forelse ($categories as $category)
            <div class="category">
                <header>
                    <h2>{!! HTML::linkRoute('category.show', $category->title, [$category->slug]) !!}</h2>
                    <div class="buttons">
                        {!! HTML::linkRoute('category.edit', 'Edit', [$category->slug], ['class' => 'button']) !!}
                        {!! HTML::linkRoute('category.destroy', 'Delete', [$category->slug], ['class' => 'button']) !!}
                    </div>
                </header>
                @if ($category->description)
                    <footer>
                        <p>{!! $category->description !!}</p>
                        <p>{{ $category->topics_count . ' topics, ' . $category->replies_count . ' replies' }}</p>
                    </footer>
                @endif
            </div>
        @empty
            There are currently no categories configured. {!! HTML::linkRoute('category.create', 'Create your first category') !!}
        @endforelse
    </div>
@stop

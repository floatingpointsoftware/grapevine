@section('main')
    <div class="row">
        <div class="page-header">
            <h1>{{ $category->title }}</h1>
        </div>

        <div class="discussions">
            @forelse ($discussions as $discussion)

            @empty
                <p>It's looking pretty quiet here in {{ $category->title }}. Let's get a dialog going.</p>
                <br>
                <p><a href="{!! route('discussion.create.with', [$category->slug]) !!}" class="btn btn-default btn-lg">Start a discussion.</a></p>
            @endforelse
        </div>
    </div>
@endsection
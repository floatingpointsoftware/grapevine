@if (count($categories))
    <ul class="menu categories">
        <li>{!! HTML::linkRoute('category.index', 'All Categories') !!}</li>
        @foreach ($categories as $category)
            <li><a href="{!! route('category.show', [$category->slug]) !!}">{!! $category->title !!}</a></li>
        @endforeach
    </ul>
@endif

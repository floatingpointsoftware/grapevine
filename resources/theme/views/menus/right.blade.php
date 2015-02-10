@if (count($categories))
    <ul class="menu categories">
        @foreach ($categories as $category)
            <li><a href="{!! route('topic.browse', [$category->slug]) !!}">{!! $category->title !!}</a></li>
        @endforeach
    </ul>
@endif

@if (count($forums))
    <ul class="menu forums">
        @foreach ($forums as $forum)
            <li><a href="{!! route('forum.show', [$forum->slug]) !!}">{!! $forum->title !!}</a></li>
        @endforeach
    </ul>
@endif

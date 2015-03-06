<div class="component categories">
    <header>
        <h4 class="soft">Categories</h4>
    </header>

    @if (count($categories))
        <ul class="menu categories list-unstyled">
            @foreach ($categories as $category)
                <li><a href="{{ $link->category->browse($category) }}">{!! $category->title !!}</a></li>
            @endforeach
        </ul>
    @endif

    <div class="buttons">
        <a class="btn btn-default btn-sm" href="{{ $link->category->create() }}" role="button">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Setup category
        </a>
    </div>
</div>

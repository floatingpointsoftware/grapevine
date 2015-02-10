<?php
/**
 * Category select dropdown. Formats the
 */
HTML::macro('categorySelect', function($name, $categories) {
    $options = $categories->lists('title', 'id');
    dd($options);

    return view('partials.html.category-dropdown');
});

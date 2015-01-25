<?php
/**
 * Forum select dropdown. Formats the
 */
HTML::macro('forumSelect', function($name, $forums) {
    $options = $forums->lists('title', 'id');
    dd($options);

    return view('partials.html.forum-dropdown');
});

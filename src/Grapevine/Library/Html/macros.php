<?php

use FloatingPoint\Grapevine\Library\Avatars\Facade as Avatar;
use FloatingPoint\Grapevine\Modules\Users\Data\User;

/**
 * Return a rendered HTML image with the src set to the avatar's location
 * from the relevant driver. The size should be supplied also to dictate
 * the width and height of the avatar. If no size is provided, it will
 * use the size from configuration.
 *
 * @param User $user
 * @param integer $size
 */
HTML::macro('avatar', function(User $user, $size = null, $attributes = []) {
    if (! is_numeric($size)) {
        $size = config('grapevine.avatar.size', 100);
    }

    $avatar = Avatar::get($user, $size);

    return view('partials.avatar', compact('avatar', 'attributes', 'size', 'user'));
});

/**
 * Used for generating labels, such as categories.
 *
 * @param string $text
 * @param null|string $class
 * @return string
 */
HTML::macro('label', function($text, $class = null) {
    if (! !is_null($class)) {
        $class = "label-{$class}";
    }

    return "<span class=\"label label-default {$class}\">{$text}</span>";
});

/**
 * Simple macro for converting markdown-enabled fields to HTML.
 *
 * @param string $text
 * @return string
 */
HTML::macro('markdown', function($text) {
    return (new Parsedown)->text($text);
});

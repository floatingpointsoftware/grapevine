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
 * @param
 */
HTML::macro('avatar', function(User $user, $size = null) {
    if (! is_numeric($size)) {
        $size = Config::get('grapevine.avatar.size', 100);
    }

    $attributes = [
        'height' => $size,
        'width' => $size
    ];

    return HTML::image(Avatar::get($user), null, $attributes);
});

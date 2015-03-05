<?php
/**
 * Package configuration.
 */
return [
    // Defines the location from which grapevine routes will work
	'route_prefix' => '/',

    // Avatar configuration. Default driver is gravatar.
    'avatar' => [
        'driver' => 'gravatar',
        'size' => 100
    ]
];

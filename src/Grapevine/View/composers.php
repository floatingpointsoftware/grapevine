<?php

use FloatingPoint\Grapevine\View\Composers;

// Define required composers.
// @TODO: Move this out and into separate package in future
View::composers([
    Composers\ForumListComposer::class => ['layouts.fullpage']
]);

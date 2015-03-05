<?php

use FloatingPoint\Grapevine\View\Composers;

// Define required composers.
View::composers([
    Composers\CategoryListComposer::class => ['layouts.fullpage'],
    Composers\CategorySelectComposer::class => ['category.form', 'discussion.form']
]);

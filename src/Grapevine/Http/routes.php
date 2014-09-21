<?php
/**
 * Contains all the forum routes.
 */

Route::resource('forum',
    'FloatingPoint\Grapevine\Http\Controllers\ForumController');
Route::resource('user',
    'FloatingPoint\Grapevine\Http\Controllers\UserController');

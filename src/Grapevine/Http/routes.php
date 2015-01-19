<?php

$routeGroupAttributes = [
    'prefix' => Config::get('grapevine.route_prefix', ''),
    'namespace' => 'FloatingPoint\Grapevine\Http\Controllers'
];

Route::group($routeGroupAttributes, function() {
    Route::get('/', 'HomeController@index');

    Route::resource('forum', 'ForumController');
    Route::resource('user', 'UserController');

    // Registrations
    Route::get('register', 'RegistrationController@create');
    Route::post('register', 'RegistrationController@store');
});

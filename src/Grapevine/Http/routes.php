<?php

$routeGroupAttributes = [
    'prefix' => Config::get('grapevine.route_prefix', ''),
    'namespace' => 'FloatingPoint\Grapevine\Http\Controllers'
];

Route::group($routeGroupAttributes, function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::resource('forum', 'ForumController');
    Route::resource('forum.topics', 'TopicController');
    Route::resource('forum.topics.posts', 'PostController');
    Route::resource('user', 'UserController');
    
    // Registrations
    Route::get('register', ['as' => 'register.form', 'uses' => 'RegistrationController@create']);
    Route::post('register', ['as' => 'register.submit', 'uses' => 'RegistrationController@store']);

    Route::get('login', ['as' => 'login.form', 'uses' => 'AuthenticationController@form']);
    Route::post('login', ['as' => 'login.submit', 'uses' => 'AuthenticationController@login']);
});

<?php

$routeGroupAttributes = [
    'prefix' => Config::get('grapevine.route_prefix', ''),
    'namespace' => 'FloatingPoint\Grapevine\Http\Controllers'
];

Route::group($routeGroupAttributes, function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::resource('category', 'CategoryController');
    Route::resource('topics', 'TopicController');
    Route::resource('topics.replies', 'ReplyController');
    Route::resource('user', 'UserController');

    // Registrations
    Route::get('register', ['as' => 'register.form', 'uses' => 'RegistrationController@create']);
    Route::post('register', ['as' => 'register.submit', 'uses' => 'RegistrationController@store']);

    Route::get('login', ['as' => 'login.form', 'uses' => 'AuthenticationController@form']);
    Route::post('login', ['as' => 'login.submit', 'uses' => 'AuthenticationController@login']);

    // Catch-all routes, which should direct to categories, topics.etc.
    Route::get('{category}/{topic}', ['as' => 'topic.read', 'uses' => 'TopicController@read']);
    Route::get('{category}', ['as' => 'topic.browse', 'uses' => 'TopicController@browse']);
});

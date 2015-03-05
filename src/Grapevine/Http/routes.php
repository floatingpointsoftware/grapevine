<?php

$routeGroupAttributes = [
    'prefix' => Config::get('grapevine.route_prefix', ''),
    'namespace' => 'FloatingPoint\Grapevine\Http\Controllers'
];

Route::group($routeGroupAttributes, function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('home', function() {
        return redirect()->route('home');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('category/setup', ['as' => 'category.setup', 'uses' => 'CategoryController@setup']);

        Route::get('discussion/create/{category}', ['as' => 'discussion.create.with', 'uses' => 'DiscussionController@create']);

        Route::resource('category', 'CategoryController');
        Route::resource('discussion', 'DiscussionController');
        Route::resource('comment', 'CommentController');
        Route::resource('user', 'UserController');
    });

    Route::group(['middleware' => 'guest'], function() {
        // Registrations
        Route::get('register', ['as' => 'register.form', 'uses' => 'RegistrationController@create']);
        Route::post('register', ['as' => 'register.submit', 'uses' => 'RegistrationController@store']);

        // Authentication
        Route::get('login', ['as' => 'login.form', 'uses' => 'AuthenticationController@form']);
        Route::post('login', ['as' => 'login.submit', 'uses' => 'AuthenticationController@login']);

        // Support laravel login routes
        Route::get('auth/login', function() {
            return redirect()->route('login');
        });
    });

    // Catch-all routes, which should direct to categories, discussions.etc.
    Route::get('{category}/{discussion}', ['as' => 'discussion.read', 'uses' => 'DiscussionController@read']);
    Route::get('{category}', ['as' => 'discussion.browse', 'uses' => 'DiscussionController@browse']);
});

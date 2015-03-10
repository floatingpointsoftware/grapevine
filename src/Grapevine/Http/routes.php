<?php

$routeGroupAttributes = [
    'prefix' => config('grapevine.route_prefix', '')
];

Route::group($routeGroupAttributes, function() {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('home', function() {
        return redirect()->route('home');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);
    });

    Route::get('category/setup', ['as' => 'category.setup', 'uses' => 'CategoryController@setup']);

    // Discussions
    Route::get('discussion/start/{category}', ['as' => 'discussion.startWith', 'uses' => 'DiscussionController@startWith']);
    Route::get('discussion/start', ['as' => 'discussion.start', 'uses' => 'DiscussionController@start']);
    Route::post('discussion/start', ['as' => 'discussion.store', 'uses' => 'DiscussionController@store']);
    Route::get('discussion/{discussion}', ['as' => 'discussion.modify', 'uses' => 'DiscussionController@modify']);
    Route::put('discussion/{discussion}', ['as' => 'discussion.update', 'uses' => 'DiscussionController@update']);
    Route::delete('discussion/{discussion}', ['as' => 'discussion.remove', 'uses' => 'DiscussionController@remove']);

    // Categories
    Route::get('category/setup', ['as' => 'category.setup', 'uses' => 'CategoryController@setup']);
    Route::post('category/setup', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
    Route::get('category/{category}', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::put('category/{category}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);

    Route::resource('comment', 'CommentController');
    Route::resource('user', 'UserController');

    Route::get('user/{user}/profile', ['as' => 'user.profile', 'uses' => 'UserController@profile']);

    Route::group(['middleware' => 'guest'], function() {
        // Registrations
        Route::get('register', ['as' => 'register', 'uses' => 'RegistrationController@create']);
        Route::post('register', ['as' => 'register.submit', 'uses' => 'RegistrationController@store']);

        // Authentication
        Route::get('login', ['as' => 'login', 'uses' => 'AuthenticationController@form']);
        Route::post('login', ['as' => 'login.submit', 'uses' => 'AuthenticationController@login']);

        // Support laravel login routes
        // @TODO: Implement our own auth checks, avoiding laravel's implementation
        Route::get('auth/login', function() {
            return redirect()->route('login');
        });
    });

    // Catch-all routes, which should direct to categories, discussions.etc.
    Route::get('{category}/{discussion}', ['as' => 'discussion.read', 'uses' => 'DiscussionController@read']);
    Route::get('{category}', ['as' => 'category.browse', 'uses' => 'DiscussionController@browse']);
});

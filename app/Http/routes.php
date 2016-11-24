<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('Login/login');
});
Route::get('Message/index', function () {
    return view('Message/index');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get("Login/login",['uses'=>'LoginController@login']);
    Route::post("Login/doLogin",['uses'=>'LoginController@doLogin']);
    Route::get("Login/registered",['uses'=>'LoginController@registered']);
    Route::post("Login/doRegistered",['uses'=>'LoginController@doRegistered']);
    Route::get("Login/userInfo",['uses'=>'LoginController@userInfo']);
    Route::get("Login/userManagement",['uses'=>'LoginController@userManagement']);
    Route::any("Login/isSureStatus/{id}",['uses'=>'LoginController@isSureStatus']);
    Route::any("Login/messageStatus/{id}",['uses'=>'LoginController@messageStatus']);
    Route::any("Login/deleteMessage/{id}",['uses'=>'LoginController@deleteMessage']);
    Route::any("Login/messageManagement",['uses'=>'LoginController@messageManagement']);
    Route::get("Login/logout",['uses'=>'LoginController@logout']);
    Route::get("Message/index",['uses'=>'MessageController@index']);
    Route::post("Message/addMessage",['as'=>'addMessage','uses'=>'MessageController@addMessage']);
});

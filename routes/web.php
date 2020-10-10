<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile','ProfileController');
Route::resource('post','PostController');
Route::resource('comment','CommentController');
Route::resource('friend','FriendController');
Route::resource('message','MessageController');


Route::post('photolike','ReactionController@like')->name('photolike');
Route::post('photodislike','ReactionController@dislike')->name('photodislike');
Route::get('add','FriendController@add')->name('add');
Route::get('myfriend','FriendController@myfriend')->name('myfriend');

<?php
use App\Thread;
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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/profile', '')
// Login and Logout;
Auth::routes();

// Threads
Route::get('threads', 'ThreadController@index');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/edit/{thread}', 'ThreadController@edit');
Route::post('threads/update/{thread}', 'ThreadController@update');


Route::post('/threads/store', 'ThreadController@store');

Route::get('/threads/{channel}', 'ThreadController@index')->middleware('auth');
Route::get('threads/{channel}/{thread}', 'ThreadController@show')->middleware('auth');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy')->middleware('auth');
Route::post('threads', 'ThreadController@store');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index');

// subscribe and unsubscribe
Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

// Replies
Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');
Route::patch('/replies/{reply}', 'RepliesController@update');


// Profile
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile')->middleware('auth');
Route::get("/profiles/{user}/notifications", 'UserNotificationsController@index')->middleware('auth');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy')->middleware('auth');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

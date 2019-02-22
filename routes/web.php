<?php
use App\Thread;
use App\User;
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
Route::post('/search', 'HomeController@search');

// Login and Logout;
Auth::routes();

// Threads
Route::get('threads', 'ThreadController@index');
Route::get('threads/create', 'ThreadController@create');
Route::get('threads/edit/{thread}', 'ThreadController@edit');
Route::post('threads/update/{thread}', 'ThreadController@update');


Route::post('/threads/store', 'ThreadController@store');

Route::get('/threads/{channel}', 'ThreadController@index');
Route::get('threads/{channel}/{slug}', 'ThreadController@show');
Route::delete('threads/{channel}/{thread}', 'ThreadController@destroy')->middleware('auth');
Route::post('threads', 'ThreadController@store')->middleware('auth');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store')->middleware('auth');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index')->middleware('auth');


// subscribe and unsubscribe
// Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
// Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

// Replies
Route::delete('/replies/{reply}', 'RepliesController@destroy')->middleware('auth');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store')->middleware('auth');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy')->middleware('auth');
Route::patch('/replies/{reply}', 'RepliesController@update')->middleware('auth');


// Profile
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile')->middleware('auth');
Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->middleware('auth');
Route::post('/profiles/{user}/update', 'ProfilesController@update')->middleware('auth');
Route::post('/profile/{profileId}/password', 'ProfilesController@password')->middleware('auth');


Route::get("/profiles/{user}/notifications", 'UserNotificationsController@index')->middleware('auth');
// Route::get("/profiles/{user}/n", 'UserNotificationsController@index')->middleware('auth');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy')->middleware('auth');
Route::get('profiles/{profileId}/follow', 'ProfilesController@followUser')->name('user.follow')->middleware('auth');
Route::get('profiles/{profileId}/unfollow', 'ProfilesController@unFollowUser')->name('user.unfollow')->middleware('auth');



//Admin Session
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', function(){
        return view('admin.index');
    })->name('admin')->middleware('auth');

    Route::get('/categories' , function(){
        return view('admin.categories.index');
    })->name('categories.index');

    Route::get('/categories/edit/{id}' , 'ChannelController@edit');
    Route::post('/categories/update/{id}' , 'ChannelController@update');
    Route::get('/categories/create' , 'ChannelController@create');
    Route::post('/categories/store' , 'ChannelController@store');
    Route::get('/categories/delete/{id}' , 'ChannelController@delete');

    Route::get('/users','UserController@index');
    Route::get('/users/delete/{id}' , 'UserController@delete');
    Route::get('/users/block/{id}' , 'UserController@block');
    Route::get('/users/unblock/{id}' , 'UserController@unblock');


    Route::get('/threads' , 'AdminThreadController@index');
    Route::get('/threads/delete/{id}' , 'AdminThreadController@delete');
    Route::get('/threads/replies/{id}' , 'AdminThreadController@replies');
    Route::get('/threads/replies/delete/{id}' , 'AdminThreadController@deletereply');


    Route::get('/adminusers' , 'AdminUserController@index');
    Route::get('/adminusers/edit/{id}' , 'AdminUserController@edit');
    Route::post('/adminusers/update/{id}' , 'AdminUserController@update');
    Route::post('/adminusers/updatepassword/{id}' , 'AdminUserController@updatePassword');
    Route::get('/adminusers/create' , 'AdminUserController@create');
    Route::post('/adminusers/store' , 'AdminUserController@store');
    Route::get('/adminusers/delete/{id}' , 'AdminUserController@delete');

    Route::get('/featuredtopics' , 'AdminThreadController@topics');
});


// Route::get('/admin/T' , 'ChannelController@delete');


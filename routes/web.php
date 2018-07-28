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
Route::post('threads', 'ThreadController@store')->middleware('auth');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store')->middleware('auth');
Route::get('/threads/{channel}/{thread}/replies', 'RepliesController@index')->middleware('auth');


// subscribe and unsubscribe
Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

// Replies
Route::delete('/replies/{reply}', 'RepliesController@destroy')->middleware('auth');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store')->middleware('auth');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy')->middleware('auth');
Route::patch('/replies/{reply}', 'RepliesController@update')->middleware('auth');


// Profile
Route::get('/profiles/{userid}', 'ProfilesController@show')->name('profile')->middleware('auth');
Route::get('/profiles/{profileId}/edit', 'ProfilesController@edit')->middleware('auth');
Route::post('/profiles/{profileId}/update', 'ProfilesController@update')->middleware('auth');
Route::post('/profile/{profileId}/password', 'ProfilesController@password')->middleware('auth');


Route::get("/profiles/{user}/notifications", 'UserNotificationsController@index')->middleware('auth');
// Route::get("/profiles/{user}/n", 'UserNotificationsController@index')->middleware('auth');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy')->middleware('auth');
Route::get('profiles/{profileId}/follow', 'ProfilesController@followUser')->name('user.follow')->middleware('auth');
Route::get('profiles/{profileId}/unfollow', 'ProfilesController@unFollowUser')->name('user.unfollow')->middleware('auth');



//Admin Session

Route::get('/admin', function(){
    return view('admin.index');
});

Route::get('/admin/categories' , function(){
    return view('admin.categories.index');
})->name('categories.index');

Route::get('/completeprofile' , function(){
    return view('completeprofile');
});


Route::get('/admin/categories/edit/{id}' , 'ChannelController@edit');
Route::post('/admin/categories/update/{id}' , 'ChannelController@update');
Route::get('/admin/categories/add' , 'ChannelController@add');
Route::post('/admin/categories/create' , 'ChannelController@create');
Route::get('/admin/categories/delete/{id}' , 'ChannelController@delete');

Route::get('/admin/users' , 'UserController@index');
Route::get('/admin/users/delete/{id}' , 'UserController@delete');


Route::get('/admin/threads' , 'AdminThreadController@index');
Route::get('/admin/threads/delete/{id}' , 'AdminThreadController@delete');
Route::get('/admin/threads/replies/{id}' , 'AdminThreadController@replies');
Route::get('/admin/threads/replies/delete/{id}' , 'AdminThreadController@deletereply');


Route::get('/admin/adminusers' , 'AdminUserController@index');
Route::get('/admin/adminusers/edit/{id}' , 'AdminUserController@edit');
Route::post('/admin/adminusers/update/{id}' , 'AdminUserController@update');
Route::get('/admin/adminusers/create' , 'AdminUserController@create');
Route::post('/admin/adminusers/store' , 'AdminUserController@store');
Route::get('/admin/adminusers/delete/{id}' , 'AdminUserController@delete');
// Route::get('/admin/T' , 'ChannelController@delete');


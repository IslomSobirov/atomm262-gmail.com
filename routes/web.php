<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
//Admin Page Controller
Route::get('/admin', 'AdminPageController@index');
Route::get('/admin/post', 'AdminPageController@publications');
Route::get('/admin/user/{id}/delete', 'AdminPageController@delete')->name('adminDeleteUser');
Route::get('/admin/post/{id}/delete', 'AdminPageController@deletePost')->name('adminDeletePost');
Route::get('/admin/user/{id}/makeAdmin', 'AdminPageController@makeAdmin')->name('makeUserAdmin');


Route::resource('/post', 'PostController')->names([
    'create' => 'post.create',
]);
Route::post('/changePassword', 'ChangePasswordController@changePassword')->name('changePassword');
Route::post('/post/search', 'PostController@search')->name('postSearch');

Route::get('/users/{id}', 'HomeController@user')->name('user');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/users', 'HomeController@users')->name('users');
Route::post('/search', 'HomeController@search')->name('search');

Route::put('/user/changeAbout', 'HomeController@changeAbout')->name('about');
Route::post('/user/personalInfo', 'HomeController@personalInfo')->name('personalInfo');

//Message
Route::post('/message/send/toUser', 'MessageController@store')->name('sendMessage');
Route::get('/message/delete/{id}', 'MessageController@destroy')->name('deleteMessage');


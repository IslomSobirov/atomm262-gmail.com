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


Route::resource('/post', 'PostController');
Route::post('/changePassword', 'ChangePasswordController@changePassword')->name('changePassword');
Route::post('/post/search', 'PostController@search');

Route::get('/users/{id}', 'HomeController@user');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/users', 'HomeController@users')->name('users');
Route::post('/search', 'HomeController@search')->name('search');

Route::put('/user/changeAbout', 'HomeController@changeAbout')->name('about');
Route::post('/user/personalInfo', 'HomeController@personalInfo')->name('personalInfo');


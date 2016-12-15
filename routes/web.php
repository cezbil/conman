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

Auth::routes();

Route::get('/', "WelcomeController@index");

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@form')->name("profile");
Route::post('/profile/edit', 'ProfileController@edit')->name("profileEdit");

Route::get('/concert/addform', 'ConcertController@addform')->name("addConcertForm");
Route::post('/concert/add', 'ConcertController@add')->name("concertAdd");

Route::get('/concert/{id}', 'ConcertController@editForm')->name("editConcertForm");
Route::post('/concert/edit', 'ConcertController@edit')->name("concertEdit");


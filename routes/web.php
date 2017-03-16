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

Route::group(['middleware' => 'auth'], function ()
{
    Route::group(['prefix' => 'profile'], function ()
    {
        Route::get('/', 'ProfileController@form')->name("profile");
        Route::post('/edit', 'ProfileController@edit')->name("profileEdit");
    });

    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'artist'], function () {
            Route::get('/', 'ArtistController@panelArtist')->name("manageArtistPanel");
            Route::post('/edit', 'ArtistController@edit')->name("artistEdit");
            Route::get('/edit', 'ArtistController@editForm')->name("artistEditForm");
            Route::post('/add', 'ArtistController@add')->name("artistAdd");
            Route::get('/add', 'ArtistController@addForm')->name("artistAddForm");
            Route::get('/delete/{id}', 'ArtistController@deleteForm')->name("artistDeleteForm");
            Route::post('/delete', 'ArtistController@delete')->name("artistDelete");
        });
    });

    Route::group(['prefix' => 'concert'], function () {
        Route::group(['prefix' => 'add'], function () {
            Route::get('/form', 'ConcertController@addform')->name("addConcertForm");
            Route::post('/', 'ConcertController@add')->name("concertAdd");
        });
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/', 'ConcertController@editForm')->name("editConcertForm");
            Route::post('/', 'ConcertController@edit')->name("concertEdit");
        });
        Route::group(['prefix' => 'delete'], function () {
            Route::get('/{id}', 'ConcertController@deleteForm')->name("deleteConcertForm");
            Route::post('/', 'ConcertController@delete')->name("concertDelete");
        });
        Route::get('/manage/{id}', 'ConcertController@index')->name("manageConcertPanel");
    });
});
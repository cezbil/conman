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
            Route::get('/', 'ArtistController@panel')->name("manageArtistPanel");
            Route::post('/edit', 'ArtistController@edit')->name("artistEdit");
            Route::get('/edit/{id}', 'ArtistController@editForm')->name("artistEditForm");
            Route::post('/add', 'ArtistController@add')->name("artistAdd");
            Route::get('/add', 'ArtistController@addForm')->name("artistAddForm");
            Route::get('/delete/{id}', 'ArtistController@deleteForm')->name("artistDeleteForm");
            Route::post('/delete', 'ArtistController@delete')->name("artistDelete");
        });
    });
    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'contractor'], function () {
            Route::get('/', 'ContractorController@panelContractor')->name("manageContractorPanel");
            Route::post('/edit', 'ContractorController@edit')->name("contractorEdit");
            Route::get('/edit/{id}', 'ContractorController@editForm')->name("contractorEditForm");
            Route::post('/add', 'ContractorController@add')->name("contractorAdd");
            Route::get('/add', 'ContractorController@addForm')->name("contractorAddForm");
            Route::get('/delete/{id}', 'ContractorController@deleteForm')->name("contractorDeleteForm");
            Route::post('/delete', 'ContractorController@delete')->name("contractorDelete");
        });
    });
    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'client'], function () {
            Route::get('/', 'ClientController@panelClient')->name("manageClientPanel");
            Route::post('/edit', 'ClientController@edit')->name("clientEdit");
            Route::get('/edit/{id}', 'ClientController@editForm')->name("clientEditForm");
            Route::post('/add', 'ClientController@add')->name("clientAdd");
            Route::get('/add', 'ClientController@addForm')->name("clientAddForm");
            Route::get('/delete/{id}', 'ClientController@deleteForm')->name("clientDeleteForm");
            Route::post('/delete', 'ClientController@delete')->name("clientDelete");
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
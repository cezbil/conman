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

    Route::group(["prefix" => "programme"], function () {
    Route::get('/', 'ProgrammeController@index')->name("programme");
    Route::get('/pdf', 'ProgrammeController@getPdf')->name("pdf");

});



    Route::group(["prefix" => "estimate"], function () {
    Route::get('/', 'EstimateController@index')->name("estimate");
    Route::get('/pdf', 'ProgrammeController@getEstimatePDF')->name("estimatePdf");

});
    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'artist'], function () {
            Route::get('/', 'ArtistController@panelArtist')->name("manageArtistPanel");
            Route::post('/edit', 'ArtistController@edit')->name("artistEdit");
            Route::get('/edit/{id}', 'ArtistController@editForm')->name("artistEditForm");
            Route::post('/add', 'ArtistController@add')->name("artistAdd");
            Route::get('/add', 'ArtistController@addForm')->name("artistAddForm");
            Route::get('/delete/{id}', 'ArtistController@deleteForm')->name("artistDeleteForm");
            Route::post('/delete', 'ArtistController@delete')->name("artistDelete");
        });
    }); 
    
    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'agenda'], function () {
            Route::get('/', 'AgendaController@panelAgenda')->name("manageAgendaPanel");
            Route::post('/add', 'AgendaController@add')->name("agendaAdd");
            Route::get('/add', 'AgendaController@addForm')->name("agendaAddForm");
            Route::get('/delete/{id}', 'AgendaController@deleteForm')->name("agendaDeleteForm");
            Route::post('/delete', 'AgendaController@delete')->name("agendaDelete");
            Route::get('/changestate/{id}', 'AgendaController@changestate')->name("changestate");
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
        Route::group(['prefix' => 'partner'], function () {
            Route::get('/', 'PartnerController@panelPartner')->name("managePartnerPanel");
            Route::post('/edit', 'PartnerController@edit')->name("partnerEdit");
            Route::get('/edit/{id}', 'PartnerController@editForm')->name("partnerEditForm");
            Route::post('/add', 'PartnerController@add')->name("partnerAdd");
            Route::get('/add', 'PartnerController@addForm')->name("partnerAddForm");
            Route::get('/delete/{id}', 'PartnerController@deleteForm')->name("partnerDeleteForm");
            Route::post('/delete', 'PartnerController@delete')->name("partnerDelete");
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
    Route::group(['middleware' => 'right.user'], function (){
        Route::group(['prefix' => 'advertisement'], function () {
            Route::get('/', 'AdvertisementController@panelAdvertisement')->name("manageAdvertisementPanel");
            Route::post('/edit', 'AdvertisementController@edit')->name("advertisementEdit");
            Route::get('/edit/{id}', 'AdvertisementController@editForm')->name("advertisementEditForm");
            Route::post('/add', 'AdvertisementController@add')->name("advertisementAdd");
            Route::get('/add', 'AdvertisementController@addForm')->name("advertisementAddForm");
            Route::get('/delete/{id}', 'AdvertisementController@deleteForm')->name("advertisementDeleteForm");
            Route::post('/delete', 'AdvertisementController@delete')->name("advertisementDelete");
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
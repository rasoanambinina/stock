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
//Auth::routes();
Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');

Route::resource('fournisseurs', 'FournisseurController');


Route::get('depositaireComptable', 'PersonnelController@depositaireComptable')->name('depositaireComptable');
Route::resource('personnels', 'PersonnelController');

Route::resource('materiels', 'MaterielController');

Route::resource('directions','DirectionController');

Route::resource('bonEntrers', 'BonEntrerController');

Route::resource('bonSorties', 'BonSortieController');

Route::resource('demandes', 'DemandeController');

Route::resource('verifications','VerificationController');


//Auth::routes();

Route::get('/personnels', 'PersonnelController@index')->name('personnels');

Route::get('/directions', 'DirectionController@index')->name('directions');

Route::get('/fournisseurs', 'FournisseurController@index')->name('fournisseurs');

Route::get('/materiels', 'MaterielController@index')->name('materiels');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bonEntrers', 'BonEntrerController@index')->name('bonEntrers');

Route::get('/bonSorties','BonSortieController@index')->name('bonSorties');

Route::get('/demandes','DemandeController@index')->name('demandes');

Route::get('/verifications','VerificationController@index')->name('verifications');


//Route::get('/personnels/depositaireComptable', [\App\Http\Controllers\PersonnelController::class, 'depositaireComptable']);

Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');

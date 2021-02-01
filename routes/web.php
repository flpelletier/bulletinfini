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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::resource('/eleves', 'ElevesController');
Route::resource('/notes', 'NotesController');
Route::resource('/matieres', 'MatieresController');
Route::resource('/promotions', 'PromotionsController');
Route::resource('/periodes', 'PeriodeController');

Route::get('/home', 'HomeController@index')->name('home');
Route::name('admin')->get('/', 'AdminController@index');

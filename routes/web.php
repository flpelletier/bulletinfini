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
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function () {

    Route::resource('/eleves', 'ElevesController');
    Route::resource('/users', 'UsersController');
    Route::resource('/notes', 'NotesController');
    Route::resource('/matieres', 'MatieresController');
    Route::resource('/promotions', 'PromotionsController');
    Route::resource('/periodes', 'PeriodeController');
    Route::resource('/professeurs', 'ProfesseurController');

    Route::get("/managementp", "GestionPromotionController@index")->name("promo.index");
    Route::post("/management/promotion", "GestionPromotionController@promo")->name("promo.manage");
    Route::get("/managementn", "GestionNoteController@index")->name("note.index");
    Route::post("/management/notes", "GestionNoteController@note")->name("note.manage");
    Route::get("/management/note/add/{id}", "GestionNoteController@add_note")->name("note.add");
    Route::get("/management/note/edit/{id}", "GestionNoteController@edit_note")->name("note.edit");
    Route::post("/management/note/update", "GestionNoteController@update")->name("note.update");
    Route::post("/management/note/destroy", "GestionNoteController@destroy")->name("note.destroy");
    Route::post("/management/note/create", "GestionNoteController@create")->name("note.create");
    Route::get("/managementb", "GestionBulletinController@index")->name("bulletin.index");
    Route::post("/management/bulletin", "GestionBulletinController@bulletin")->name("bulletin.manage");

    Route::get('/index', 'DashboardController@index')->name('index');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::name('admin')->get('/', 'AdminController@index');
});

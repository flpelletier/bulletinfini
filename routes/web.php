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
    Route::delete('eleves-deleteselection', 'ElevesController@deleteAll');
    Route::resource('/users', 'UsersController');
    Route::delete('users-deleteselection', 'UserController@deleteAll');
    Route::resource('/notes', 'NotesController');
    Route::delete('notes-deleteselection', 'NotesController@deleteAll');
    Route::resource('/matieres', 'MatieresController');
    Route::delete('matieres-deleteselection', 'MatieresController@deleteAll');
    Route::resource('/promotions', 'PromotionsController');
    Route::delete('promotions-deleteselection', 'PromotionsController@deleteAll');
    Route::resource('/periodes', 'PeriodeController');
    Route::delete('periodes-deleteselection', 'PeriodeController@deleteAll');
    Route::resource('/professeurs', 'ProfesseurController');
    Route::delete('professeurs-deleteselection', 'ProfesseurController@deleteAll');
    Route::resource('/groupes', 'GroupeMatieresController');
    Route::delete('groupes-deleteselection', 'GroupeMatieresController@deleteAll');

    Route::get("/managementp", "GestionPromotionController@index")->name("promo.index");
    Route::post("/management/promotion", "GestionPromotionController@promo")->name("promo.manage");
    Route::get("/managementn", "GestionNoteController@index")->name("note.index");
    Route::post("/management/notes", "GestionNoteController@note")->name("note.manage");
    Route::get("/management/note/add/{id}", "GestionNoteController@add_note")->name("note.add");
    Route::get("/management/note/edit/{id}", "GestionNoteController@edit_note")->name("note.edit");
    Route::get("/management/note/show/{id}", "GestionNoteController@show_note")->name("note_matiere.show");
    Route::post("/management/note/update", "GestionNoteController@update")->name("note.update");
    Route::post("/management/note/destroy", "GestionNoteController@destroy")->name("note.destroy");
    Route::post("/management/note/create", "GestionNoteController@create")->name("note.create");
    Route::get("/managementb", "GestionBulletinController@index")->name("bulletin.index");
    Route::post("/management/bulletin", "GestionBulletinController@bulletin")->name("bulletin.manage");
    Route::get("/management/bulletin/add/{id}", "GestionBulletinController@add_bulletin")->name("bulletin.add");
    Route::post("/management/bulletin/create", "GestionBulletinController@create")->name("bulletin.create");
    //Route::get('/index', 'DashboardController@index')->name('index');
    Route::get('/', 'DashboardController@index')->name('index');

    //Route::get('/home', 'HomeController@index')->name('home');
    //Route::name('admin')->get('/', 'AdminController@index');
});

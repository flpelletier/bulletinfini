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
    Route::delete('users-deleteselection', 'UsersController@deleteAll');
    Route::resource('/notes', 'NotesController');
    Route::delete('notes-deleteselection', 'NotesController@deleteAll');
    Route::resource('/matieres', 'MatieresController');

    Route::get('/management/addmultiple/', 'MatieresController@add_multiple')->name("matieres.addmultiple");
    Route::post('/management/storemultiple', 'MatieresController@store_multiple')->name("matieres.storemultiple");

    Route::delete('matieres-deleteselection', 'MatieresController@deleteAll');
    Route::resource('/promotions', 'PromotionsController');
    Route::delete('promotions-deleteselection', 'PromotionsController@deleteAll');
    Route::resource('/periodes', 'PeriodeController');
    Route::delete('periodes-deleteselection', 'PeriodeController@deleteAll');
    Route::resource('/professeurs', 'ProfesseurController');
    Route::delete('professeurs-deleteselection', 'ProfesseurController@deleteAll');
    Route::resource('/groupes', 'GroupeMatieresController');
    Route::delete('groupes-deleteselection', 'GroupeMatieresController@deleteAll');
    Route::resource('/notescertification', 'NotesCertificationController');
    Route::delete('notescertification-deleteselection', 'NotesCertificationController@deleteAll');
    Route::resource('/matierescertification', 'MatieresCertificationController');
    Route::delete('matierescertification-deleteselection', 'MatieresCertificationController@deleteAll');

    Route::get("/managementp", "GestionPromotionController@index")->name("promo.index");
    Route::post("/management/promotion", "GestionPromotionController@promo")->name("promo.manage");
    Route::get("/management/promotion/add", "GestionPromotionController@promo_add")->name("promo.add");

    Route::get("/managementn", "GestionNoteController@index")->name("note.index");
    Route::post("/management/notes", "GestionNoteController@note")->name("note.manage");
    Route::get("/management/note/add/{id}", "GestionNoteController@add_note")->name("note.add");
    Route::get("/management/note/edit/{id}", "GestionNoteController@edit_note")->name("note.edit");
    Route::get("/management/note/show/{id}", "GestionNoteController@show_note")->name("note_matiere.show");

    Route::post("/management/certif-note/add/{id}", "GestionNoteController@add_certif_note")->name("certif-note.add");
    Route::get("/management/certif-note/edit/{id}", "GestionNoteController@edit_certif_note")->name("certif-note.edit");
    Route::get("/management/certif-note/show/{id}", "GestionNoteController@show_certif_note")->name("certif-note_matiere.show");


    Route::post("/management/note/update", "GestionNoteController@update")->name("note.update");
    Route::post("/management/note/destroy", "GestionNoteController@destroy")->name("note.destroy");
    Route::post("/management/note/create", "GestionNoteController@create")->name("note.create");


    Route::post("/management/certif-note/update", "GestionNoteController@certif_update")->name("certif-note.update");
    Route::post("/management/certif-note/destroy", "GestionNoteController@certif_destroy")->name("certif-note.destroy");
    Route::post("/management/certif-note/create", "GestionNoteController@certif_create")->name("certif-note.create");


    Route::get("/managementb", "GestionBulletinController@index")->name("bulletin.index");
    Route::post("/management/bulletin", "GestionBulletinController@bulletin")->name("bulletin.manage");
    Route::get("/management/bulletin/add/{id}", "GestionBulletinController@add_bulletin")->name("bulletin.add");
    Route::post("/management/bulletin/create", "GestionBulletinController@create")->name("bulletin.create");
    Route::delete("/management/bulletin/destroy/{id}", "GestionBulletinController@destroy")->name("bulletin.destroy");

    Route::get("/managementc", "GestionCertificationController@index")->name("certification.index");
    Route::post("/management/certification", "GestionCertificationController@bulletin")->name("certification.manage");
    Route::get("/management/certification/add/{id}", "GestionCertificationController@add_bulletin")->name("certification.add");
    Route::post("/management/certification/create", "GestionCertificationController@create")->name("certification.create");

    //Route::get('/index', 'DashboardController@index')->name('index');
    Route::get('/', 'DashboardController@index')->name('index');
    Route::post("simple-excel/import", "ElevesController@import")->name('excel.import');

    //Route::get('/home', 'HomeController@index')->name('home');
    //Route::name('admin')->get('/', 'AdminController@index');
});

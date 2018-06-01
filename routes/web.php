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


Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/test', 'PagesController@index');

Route::resource('posts','PostsController');

Route::resource('matchs','MatchsController');

Route::resource('pronostics','PronosticsController');
Route::get('pronostic/{element}', 'PronosticsController@afficherTour')->name('choix_prono');
Route::get('pronostic/match/{choix}/{element}', 'PronosticsController@afficherMatch')->name('choix_prono2');

Route::resource('equipes','EquipesController');

Route::resource('joueurs','JoueursController');
Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/classement', 'ClassementController@index')->name('classement');
Route::get('/classement/{name}', 'ClassementController@show')->name('classement_user');

Route::get('/règles', 'ReglesController@index')->middleware('auth')->name('regles');

/************************** ADMIN ****************************************/
//liste des users
Route::get('/admin/users', 'AdminController@users_index')->middleware('admin')->name('admin_users');

//liste des matchs
Route::get('/admin/matchs', 'AdminController@matchs_index')->middleware('admin')->name('admin_matchs');
Route::get('/admin/match/{id}/edit', 'AdminController@match_edit')->middleware('admin')->name('admin_edit_match');
Route::put('/admin/match/{id}', 'AdminController@match_update')->middleware('admin')->name('admin_update_match');
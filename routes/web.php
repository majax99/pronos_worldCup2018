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

Route::get('/', function () {
    return view('home');
});

Route::get('/test', 'PagesController@index');

Route::resource('posts','PostsController');

Route::resource('matchs','MatchsController');

Route::resource('pronostics','PronosticsController');

Route::resource('scores','ScoresController');

Route::resource('equipes','EquipesController');

Route::resource('joueurs','JoueursController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

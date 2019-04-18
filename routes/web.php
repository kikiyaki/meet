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

Route::get('/', 'MainController@showHome')->name('home');
Route::get('/meetList', 'MainController@showMeetList');
Route::get('/meet/{id}', 'MainController@showMeet');
Route::get('/create', 'MainController@showCreate');
Route::get('/myMeets', 'MainController@showMyMeets');

Route::post('/createMeet', 'WriteController@createMeet');
Route::post('/deleteMeet', 'WriteController@deleteMeet');
Route::post('/addParticipant', 'WriteController@addParticipant');
Route::post('/deleteParticipant', 'WriteController@deleteParticipant');

//AJAX routes
Route::post('/addPoint', 'WriteController@addPoint');
Route::post('/removePoint', 'WriteController@removePoint');

//Auth routes
Auth::routes();
Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

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
    return view('welcome');
    //return view('tasks.create');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('tasks/report', 'TaskController@report')->name('tasks.report');
Route::resource('tasks', 'TaskController');

Route::resource('levels', 'LevelController');

//Route::post('/task','TasksController@create');
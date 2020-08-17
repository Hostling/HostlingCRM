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

Route::get('', 'HostingController@index')->name('index')->middleware('auth.basic');
Route::get('create', 'HostingController@create')->middleware('auth.basic');
Route::post('create', 'HostingController@create')->name('create')->middleware('auth.basic');
Route::get('edit/{id}', 'HostingController@edit')->middleware('auth.basic');
Route::post('update/{id}', 'HostingController@update')->name('update')->middleware('auth.basic');
Route::delete('delete/{id}', 'HostingController@delete')->name('delete')->middleware('auth.basic');
Route::get('bot', 'TelegramController@bot')->middleware('auth.basic');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

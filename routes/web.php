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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/publications', 'PublicationController@index')->name('publications');

Route::get('/publications/create', 'PublicationController@create')->name('create');

Route::post('/publications/create', 'PublicationController@store')->name('publications');

Route::get('/publications/{publication}', 'PublicationController@show');

Route::get('/profile', 'ProfilesController@show')->name('profile');

Route::get('/publications/update/{publication}', 'PublicationController@update');

Route::post('/publications/update/{publication}', 'PublicationController@restore');

Route::get('/publications/delete/{publication}', 'PublicationController@delete');

//Route::resourse('publications', 'PublicationsController');
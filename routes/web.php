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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/cv', 'CvController@store')->name('cv.store');
Route::get('/cv/create', 'CvController@create')->name('cv.create');
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

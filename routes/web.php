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

Route::patch('/cv/{user}', 'CvController@update')->name('cv.update');
Route::get('/cv/{user}', 'CvController@show')->name('cv.show');
Route::get('/cv/{user}/delete','CvController@delete')->name('cv.destroy');

Route::get('/job/{user}', 'JobController@show')->name('job.show');
Route::patch('/job/{user}', 'JobController@update')->name('job.update');
Route::get('/job/{user}/delete','JobController@delete')->name('job.destroy');

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

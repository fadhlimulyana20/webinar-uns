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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index')->name('index');
Route::get('/tentang', 'PagesController@about')->name('about');

Route::resource('webinar', 'WebinarJadwalsController');
// Webinar Jadwal Routing
// Route::get('/webinar', 'WebinarJadwalsController@index')->name('webinar.index');
// Route::post('webinar', 'WebinarJadwalsController@store')->name('webinar.store');
// Route::get('/webinar/buat', 'WebinarJadwalsController@create')->name('webinar.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('SuperUser')->prefix('superuser')->name('superuser.')->middleware('can:manage-users')->group(function(){
  Route::resource('/users', 'UsersController');
});

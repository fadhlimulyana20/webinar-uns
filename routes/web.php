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

Route::get('/webinar/mywebinar', 'WebinarJadwalsController@my')->name('webinar.user_index');
// Route::resource('webinar', 'WebinarJadwalsController');
// Webinar Jadwal Routing
Route::get('/webinar', 'WebinarJadwalsController@index')->name('webinar.index');
Route::get('/webinar/{webinar}', 'WebinarJadwalsController@show')->name('webinar.show');
// Route::post('webinar', 'WebinarJadwalsController@store')->name('webinar.store');
// Route::get('/webinar/buat', 'WebinarJadwalsController@create')->name('webinar.create');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('SuperUser')->prefix('superuser')->name('superuser.')->middleware('can:manage-users')->group(function(){
  Route::resource('/users', 'UsersController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:are-admin')->group(function(){
  Route::get('beranda/', 'AdminController@index')->name('layout');
  Route::get('webinar/', 'AdminController@webinar')->name('webinar');
  Route::post('webinar/', 'AdminController@storeWebinar')->name('webinar.store');
  Route::delete('webinar/{webinar}', 'AdminController@destroyWebinar')->name('webinar.destroy');
  Route::get('webinar/create', 'AdminController@createWebinar')->name('webinar.create');
  Route::get('webinar/{webinar}/edit', 'AdminController@editWebinar')->name('webinar.edit');
  Route::match(['put', 'patch'], 'webinar/{webinar}', 'AdminController@updateWebinar')->name('webinar.update');
  // Pembicara Routing
  Route::get('pembicara/', 'AdminController@Pembicara')->name('pembicara');
  Route::get('pembicara/create', 'AdminController@CreatePembicara')->name('pembicara.create');
  Route::post('pembicara/', 'AdminController@StorePembicara')->name('pembicara.store');
  Route::put('pembicara/{id}', 'AdminController@UpdatePembicara')->name('pembicara.update');
  Route::get('pembicara/{id}/edit', 'AdminController@EditPembicara')->name('pembicara.edit');
  Route::delete('pembicara/{id}', 'AdminController@DestroyPembicara')->name('pembicara.destroy');
});

Route::namespace('Pendaftar')->prefix('pendaftar')->name('pendaftar.')->middleware('can:are-pendaftar')->group(function(){
  Route::get('beranda/', 'PendaftarController@index')->name('index');
  Route::get('webinar/','PendaftarController@webinar')->name('webinar');
});

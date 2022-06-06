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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('pages/icons', 'PageController@icons')->name('pages.icons');
    Route::get('pages/maps', 'PageController@maps')->name('pages.maps');
    Route::get('pages/notifications', 'PageController@notifications')->name('pages.notifications');
    Route::get('pages/tables', 'PageController@tables')->name('pages.tables');
    Route::get('pages/typography', 'PageController@typography')->name('pages.typography');
    Route::get('pages/rtl', 'PageController@rtl')->name('pages.rtl');
    Route::get('pages/upgrade', 'PageController@upgrade')->name('pages.upgrade');

    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/edit', 'UserController@edit')->name('users.edit');
    Route::get('users/destroy', 'UserController@destroy')->name('users.destroy');
    
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('profile/password', 'ProfileController@password')->name('profile.password');
});

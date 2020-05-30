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
    return view('landing');
});

Route::get('/login', 'SiteController@loginForm')->name('login');
Route::post('/login', 'SiteController@login');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/election', 'ElectionController@index')->name('home');

    Route::get('/logout','SiteController@logout');
});

Route::group(['middleware'=>'admin'], function(){
    Route::get('/election/create','ElectionController@create');
    Route::post('/election','ElectionController@store');
    Route::get('/election/member', 'ElectionController@viewAsMember');
    Route::get('/election/{election}', 'ElectionController@show');
    Route::put('/election/{election}', 'ElectionController@update');
    Route::post('/election/status', 'ElectionController@changeStatus');
    Route::get('/election/{election}/results', 'ElectionController@results');
});

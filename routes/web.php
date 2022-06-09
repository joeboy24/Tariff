<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\Homepage;
// use Session;

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

Route::get('/', 'PagesController@index'); 

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/dashboard', 'DashpagesController@index');
// Route::get('/pcoursereg', 'DashpagesController@programs_course_reg');


Auth::routes(['register' => false]);
Route::resource('/tariff', 'TariffController');
Route::get('/history', 'PagesController@tariff_history');
Route::get('/code80', 'PagesController@code80');



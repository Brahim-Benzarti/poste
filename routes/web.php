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
Route::get('/', 'App\Http\Controllers\WellcomeController@toshow');

Route::get('currencies', 'App\Http\Controllers\currencies@toshow');

Route::get('featuring', 'App\Http\Controllers\featuring@show');

Route::get('/ena_tounsi', 'App\Http\Controllers\ena_tounsi@show')->name('ena_tounsi');
Route::get('/ena_tounsi_state_offices', 'App\Http\Controllers\ena_tounsi@showoffices')->name('ena_tounsi_state_offices');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

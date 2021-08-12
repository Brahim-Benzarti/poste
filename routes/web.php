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
Route::get('/', 'App\Http\Controllers\WellcomeController@toshow')->name("index");

Route::get('currencies', 'App\Http\Controllers\currencies@toshow');

Route::get('featuring', 'App\Http\Controllers\featuring@show');

// ena tounsi
Route::get('EnaTounsi', [App\Http\Controllers\ena_tounsi::class , 'show'])->name('ena_tounsi');
Route::get('ena_tounsi_state_offices', 'App\Http\Controllers\ena_tounsi@showoffices')->name('ena_tounsi_state_offices');
Route::post('EnaTounsi', [App\Http\Controllers\ena_tounsi::class , 'submit'])->name('ena_tounsi');
Route::view('success','/layouts/success', ["success_message" => "The form has been Successfully submitted!!"])->name('ena_tounsi_success');

// news
// Route::group(["middleware"=>"request"], function(){
//     Route::get('news', [App\Http\Controllers\news::class , 'show'])->name('news');
    

// })
Route::middleware(["auth"])->group(function () {
    Route::get('news', [App\Http\Controllers\news::class , 'show'])->name('news');
});


// Route::get('news', [App\Http\Controllers\news::class , 'show'])->name('news');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


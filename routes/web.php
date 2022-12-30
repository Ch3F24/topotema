<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\PageController;
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

// Home
Route::get('/', [HomeController::class,'index'])->name('home');

// Object view
Route::get('/object/{object?}',[ObjectController::class,'show'])->name('object');

// Search results
Route::get('/search',[ObjectController::class,'search'])->name('search');

//Imprint page
Route::get('/imprint',[PageController::class,'imprint'])->name('imprint');

//Legal notice page
Route::get('/legal-notice',[PageController::class,'legal_notice'])->name('legal_notice');


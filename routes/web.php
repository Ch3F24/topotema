<?php

use App\Http\Controllers\PageController;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [PageController::class,'home'])->name('home');

Route::get('/address/{address?}',[PageController::class,'address'])->name('address.view');
Route::get('/object/{object?}',[PageController::class,'object'])->name('object.view');
Route::get('/search',[PageController::class,'search'])->name('search');
//Route::get('/search')

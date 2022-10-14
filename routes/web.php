<?php

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

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/object', function () {
    return view('pages.object');
});

Route::get('/db', function () {
    dd(Event::query()->get());
//    DB::listen(function ($query) {
//        dump("{$query->time} ==> {$query->sql}");
//    });
});

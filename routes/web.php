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
//    $event = Event::query()->findOrFail($id);
    return view('pages.object');
});

//Route::get('/object/{id}', function ($id) {
//    $event = Event::query()->findOrFail($id);
//    return view('pages.object',compact('event'));
//});

Route::get('/db', function () {
//    return DB::connection('oracle')->table('EVENTS')->get();
//    $tables = DB::select('SHOW TABLES');
//    foreach ($tables as $table) {
//        foreach ($table as $key => $value)
//            echo $value;
//    }
//    $data = DB::table('EVENTS')->get();
//    $data = DB::table('all_tables')->select('table_name')->get();
//    $data = DB::table('EVENTS')->select('*')->get();
    return Event::query()->get();
//    DB::listen(function ($query) {
//        dump("{$query->time} ==> {$query->sql}");
//    });
});

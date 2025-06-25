<?php

use Illuminate\Support\Facades\Route;
use App\Modules\DigitalSign\Controllers\TestController;

Route::get('/portrait', function () {
    return view('DigitalSign::1');
});

// Route::get('/portrait2', function () {
//     return view('DigitalSign::portrait2');
// });

// Route::get('/portrait3', function () {
//     return view('DigitalSign::portrait3');
// });

// Route::get('/portrait4', function () {
//     return view('DigitalSign::portrait4');
// });

/**
 * Dashboard
 */
$slug = 'test';
Route::group(['middleware' => ['web'],'namespace' => 'App\Modules\DigitalSign\Controllers','prefix'=>$slug], function () use ($slug){
    Route::get('/', [TestController::class, 'index'])->name('dashboard.'.$slug.'.read');
});
/**
 * Routes of DigitalSign/Lantai module
 */
Route::controller(App\Modules\DigitalSign\Controllers\LantaiController::class)->middleware(['web','auth'])->name('lantai.')->prefix('lantai')->group(function (){
    Route::get('/', 'index')->name('read');
    Route::post('/filter', 'filter')->name('filter.read');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

/**
 * Routes of DigitalSign/Rooms module
 */
Route::controller(App\Modules\DigitalSign\Controllers\RoomsController::class)->middleware(['web','auth'])->name('rooms.')->prefix('rooms')->group(function (){
    Route::get('/', 'index')->name('read');
    Route::post('/filter', 'filter')->name('filter.read');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

/**
 * Routes of DigitalSign/Jadwal module
 */
Route::controller(App\Modules\DigitalSign\Controllers\JadwalController::class)->middleware(['web','auth'])->name('jadwal.')->prefix('jadwal')->group(function (){
    Route::get('/', 'index')->name('read');
    Route::post('/filter', 'filter')->name('filter.read');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

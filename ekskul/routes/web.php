<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkskulController;

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
Route::resource('ekskul', EkskulController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('/', SiswaController::class);


Route::prefix('ekskul')->group(function(){
    Route::get('/take/{ekskul}', [EkskulController::class, 'take'])->name('ekskuls.take');
    Route::post('/take/{ekskul}', [EkskulController::class, 'takeStore'])->name('ekskuls.takeStore');
});

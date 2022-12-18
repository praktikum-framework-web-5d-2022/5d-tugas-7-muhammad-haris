<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;

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

Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);
Route::resource('/', DokterController::class);


Route::prefix('pasien')->group(function(){
    Route::get('/take/{pasien}', [PasienController::class, 'take'])->name('pasiens.take');
    Route::post('/take/{pasien}', [PasienController::class, 'takeStore'])->name('pasiens.takeStore');
});

Route::fallback(function() {
    return view('fail');
});


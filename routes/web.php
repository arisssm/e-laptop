<?php

use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::get('/', function () {
    return view('app');
});

ROute::group(['middleware' => 'auth'], function(){
    Route::resource('/merek', MerekController::class)->except(['show']);
    Route::resource('/produk', ProdukController::class)->except(['show']);
    Route::resource('/bank', BankController::class)->except(['show']);
    Route::resource('/pengiriman', PengirimanController::class)->except(['show']);
    Route::get('/banner/{spanduk}', [BannerController::class, 'index']);
    Route::get('/banner/create/{spanduk}', [BannerController::class, 'create']);
    Route::post('/banner/{spanduk}', [BannerController::class, 'store']);
    Route::get('/banner/edit/{id}/{spanduk}', [BannerController::class, 'edit']);
    Route::put('/banner/{id}/{spanduk}', [BannerController::class, 'update']);
    Route::delete('/banner/{id}/{spanduk}', [BannerController::class, 'destroy']);
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

/*
|--------------------------------------------------------------------------
| Example
|--------------------------------------------------------------------------
|Route::get('/merek', [MerekController::class, 'index']);
|Route::get('/merek/create', [MerekController::class, 'create']);
|Route::post('/merek', [MerekController::class, 'store']);
|Route::get('/merek/{merek}/edit', [MerekController::class, 'edit']);
|Route::put('/merek/{merek}', [MerekController::class, 'update']);
|Route::delete('/merek/{merek}', [MerekController::class, 'destroy']);
|Route::get('/banner/createdua', [BannerController::class, 'createdua']);
|Route::post('/banner/storedua', [BannerController::class, 'storedua']);
|Route::get('/banner/{banner}/editdua', [BannerController::class, 'editdua']);
|Route::put('/banner/{banner}/updatedua', [BannerController::class, 'updatedua']);
|Route::delete('/banner/{banner}/destroydua', [BannerController::class, 'destroydua']);
|
*/



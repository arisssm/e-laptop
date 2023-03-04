<?php

use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\BannerController;
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
    return view('app');
});

// Merek
// Route::get('/merek', [MerekController::class, 'index']);
// Route::get('/merek/create', [MerekController::class, 'create']);
// Route::post('/merek', [MerekController::class, 'store']);
// Route::get('/merek/{merek}/edit', [MerekController::class, 'edit']);
// Route::put('/merek/{merek}', [MerekController::class, 'update']);
// Route::delete('/merek/{merek}', [MerekController::class, 'destroy']);

// Banner
// Route::get('/banner/createdua', [BannerController::class, 'createdua']);
// Route::post('/banner/storedua', [BannerController::class, 'storedua']);
// Route::get('/banner/{banner}/editdua', [BannerController::class, 'editdua']);
// Route::put('/banner/{banner}/updatedua', [BannerController::class, 'updatedua']);
// Route::delete('/banner/{banner}/destroydua', [BannerController::class, 'destroydua']);

// Resource
Route::resource('/merek', MerekController::class);
Route::resource('/produk', ProdukController::class);
Route::resource('/bank', BankController::class);
Route::resource('/pengiriman', PengirimanController::class);
Route::get('/banner/{spanduk}', [BannerController::class, 'index']);
Route::get('/banner/create/{spanduk}', [BannerController::class, 'create']);
Route::post('/banner/{spanduk}', [BannerController::class, 'store']);
Route::get('/banner/edit/{id}/{spanduk}', [BannerController::class, 'edit']);
Route::put('/banner/{id}/{spanduk}', [BannerController::class, 'update']);
Route::delete('/banner/{id}/{spanduk}', [BannerController::class, 'destroy']);
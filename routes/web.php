<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // Route::resource('admin', [AdminController::class]);

    /**
     * Route Halaman Home
     */
    Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/home/create', [AdminController::class, 'create']);
    Route::post('/admin/home/store', [AdminController::class, 'store']);
    Route::delete('/admin/home/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/home/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/home/{id}', [AdminController::class, 'update']);

    /**
     * Route Halaman Petugas
     */
    Route::get('/admin/petugas', [AdminController::class, 'dtpetugas']);
    Route::post('/admin/petugas/store', [AdminController::class, 'petugas_store']);
    Route::delete('/admin/petugas/{id}', [AdminController::class, 'petugas_destroy']);
    Route::get('/admin/petugas/{id}/edit', [AdminController::class, 'petugas_edit']);
    Route::put('/admin/petugas/{id}', [AdminController::class, 'petugas_update']);

    /**
     * Route Halaman Pembayaran
     */
    Route::get('/admin/pembayaran', [PembayaranController::class, 'pembayaran']);
    Route::post('/admin/pembayaran/store', [PembayaranController::class, 'storePembayaran']);
    Route::delete('/admin/pembayaran/{id}', [PembayaranController::class, 'deletePembayaran']);
    Route::get('/admin/pembayaran/{id}/edit', [PembayaranController::class, 'editPembayaran']);
    Route::put('/admin/pembayaran/{id}', [PembayaranController::class, 'updatePembayaran']);

    /**
     * Route Halaman Cetak
     */

    Route::get('/admin/cetak', [AdminController::class, 'print']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [ManagerController::class, 'managerHome'])->name('manager.home');
    Route::post('/manager/home/store', [ManagerController::class, 'storePembayaran']);
});

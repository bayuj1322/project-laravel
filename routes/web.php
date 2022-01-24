<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UserAdmin;
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

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/',                     [Dashboard::class, 'Check']);
        Route::prefix('admin')->group(function () {
            Route::get('/perusahaan',       [UserAdmin::class, 'PerusahaanView']);
            Route::get('/aplikasi',         [UserAdmin::class, 'AplikasiView']);
            Route::get('/teknisi',          [UserAdmin::class, 'TeknisiView']);
        });

        Route::prefix('reporter')->group(function () {
        });

        Route::prefix('teknisi')->group(function () {
        });
    });
});

require __DIR__ . '/auth.php';

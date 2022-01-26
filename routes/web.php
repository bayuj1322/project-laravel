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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/',                     [Dashboard::class, 'Check']);
        Route::prefix('admin')->group(function () {
            Route::get('/',                     [UserAdmin::class, 'AdminView']);
            Route::get('/user',                 [UserAdmin::class, 'UserView']);
            Route::post('/user/add',            [UserAdmin::class, 'UserAdd']);
            Route::get('/perusahaan',           [UserAdmin::class, 'PerusahaanView']);
            Route::post('/perusahaan/add',      [UserAdmin::class, 'PerusahaanAdd']);
            Route::get('/aplikasi',             [UserAdmin::class, 'AplikasiView']);
            Route::post('/aplikasi/add',        [UserAdmin::class, 'AplikasiAdd']);
            Route::get('/teknisi',              [UserAdmin::class, 'TeknisiView']);
            Route::post('/teknisi/add',         [UserAdmin::class, 'TeknisiAdd']);
        });

        Route::prefix('reporter')->group(function () {
        });

        Route::prefix('teknisi')->group(function () {
        });
    });
});

require __DIR__ . '/auth.php';

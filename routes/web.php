<?php

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

Route::get('/teknisi', [UserAdmin::class, 'Teknisi']);
Route::get('/aplikasi', [UserAdmin::class, 'Aplikasi']);
Route::get('/perusahaan', [UserAdmin::class, 'Perusahaan']);



// Route::get('/aplikasi', function () {
//     return view('aplikasi');
// })

// ->middleware(['auth'])->name('aplikasi');

// require __DIR__ . '/auth.php';

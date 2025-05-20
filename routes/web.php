<?php

use App\Http\Controllers\SeragamController;
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


Route::get('/', [SeragamController::class, 'index'])->name('seragam.index');
Route::post('/', [SeragamController::class, 'store'])->name('seragam.store');

Route::get('/invoice/{id}', [SeragamController::class, 'invoice'])->name('invoice');

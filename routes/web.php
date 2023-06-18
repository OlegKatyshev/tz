<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;
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

Route::get('/', [UrlController::class, 'index'])->name('url.index');
Route::post('/url/save', [UrlController::class, 'save'])->name('url.save');
Route::get('/url/reset', [UrlController::class, 'reset'])->name('url.reset');

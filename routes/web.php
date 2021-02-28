<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 1. Route Biasa
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2 & 4. Route Prefix
Route::prefix('/category')->group(function(){
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('program', [ProgramController::class, 'index'])->name('program');
});

// 3. Route Param
Route::get('/news/{title}', [NewsController::class, 'index'])->name('news');

// 4. Route Biasa
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

// 5. Route Resource
Route::resource('/contact-us', ContactController::class, [
    'only' => ['index']
]);

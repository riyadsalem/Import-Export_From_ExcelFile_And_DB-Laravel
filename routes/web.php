<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


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


Route::get('/', [ProductController::class , 'index'] )->name('show.products');
Route::post('products/export', [ProductController::class , 'export'] )->name('products.export');




Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');


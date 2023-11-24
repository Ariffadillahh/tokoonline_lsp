<?php

use App\Http\Controllers\BokingController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\JenisbukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjagaperpusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
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


Route::get("/register", [RegisterController::class, "index"]);
Route::post("/register/action", [RegisterController::class, "store"])->middleware('guest')->name("registeraction");
Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post("/login/action", [LoginController::class, "store"])->name('loginaction');
Route::post("/logout", [LoginController::class, "destroy"])->name('logout')->middleware('auth');
Route::get("/", [LoginController::class, "show"])->name('dashboard');

Route::get('/add', [ProductController::class, 'index']);
Route::post('/add', [ProductController::class, 'store'])->name('add');


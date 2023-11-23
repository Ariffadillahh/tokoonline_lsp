<?php

use App\Http\Controllers\BokingController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\JenisbukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjagaperpusController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get("/register", [RegisterController::class, "index"]);
Route::post("/register/action", [RegisterController::class, "store"])->middleware('guest')->name("registeraction");

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post("/login/action", [LoginController::class, "store"])->name('loginaction');

Route::post("/logout", [LoginController::class, "destroy"])->name('logout')->middleware('auth');


Route::get("/", [LoginController::class, "show"])->name('dashboard');
Route::get("/detail/{id}", [DaftarbukuController::class, "show"])->name('lihat')->middleware('auth');
Route::get("detail/booking/{id}", [BokingController::class, "index"])->name('boking')->middleware('auth');
Route::post("detail/booking/action", [BokingController::class, "store"])->name('bokingaction')->middleware('auth');

Route::get("/pinjaman", [BokingController::class, "show"])->name('lihat')->middleware('auth');

Route::get("pinjaman/rate/{id}", [RatingController::class, "index"])->name('rate')->middleware('auth');
Route::post("pinjaman/rate", [BokingController::class, "rate"])->name('rateaction')->middleware('auth');

Route::get("/admin", [LoginController::class, "admin"])->name('admin')->middleware('auth');
Route::get("/admin/penjaga", [LoginController::class, "penjaga"])->name('penjaga')->middleware('auth');
Route::get("/admin/pinjam", [LoginController::class, "pinjam"])->name('pinjam')->middleware('auth');
Route::get("/admin/user", [LoginController::class, "user"])->name('user')->middleware('auth');
Route::get("/admin/book", [LoginController::class, "book"])->name('book')->middleware('auth');

Route::post("/deletratings", [BokingController::class, "destroy"])->name('delrate')->middleware('auth');

Route::post("/addbuku", [DaftarbukuController::class, "store"])->name('addbook')->middleware('auth');
Route::post("/hapusbuku", [DaftarbukuController::class, "destroy"])->name('hapusbook')->middleware('auth');
Route::post("/updatebook", [DaftarbukuController::class, "update"])->name('updatebook')->middleware('auth');
Route::post("/hapuspenjaga", [PenjagaperpusController::class, "destroy"])->name('hapuspenjaga')->middleware('auth');
Route::post("/addExcel", [PenjagaperpusController::class, "addExcel"])->name('addExcel')->middleware('auth');
Route::post("/addpenjaga", [PenjagaperpusController::class, "store"])->name('addpenjaga')->middleware('auth');
Route::post("/addjenis", [JenisbukuController::class, "store"])->name('addjenis')->middleware('auth');
Route::post("/updatejenis", [JenisbukuController::class, "update"])->name('updatejenis')->middleware('auth');
Route::post("/updatepenjaga", [PenjagaperpusController::class, "update"])->name('updatepenjaga')->middleware('auth');
Route::post("/hapususer", [RegisterController::class, "destroy"])->name('hapusUser')->middleware('auth');
Route::post("/hapusjenis", [JenisbukuController::class, "destroy"])->name('hapusjenis')->middleware('auth');

Route::get("export", [PenjagaperpusController::class, "export"])->middleware('auth');
Route::post("import", [PenjagaperpusController::class, "import"])->name('import')->middleware('auth');

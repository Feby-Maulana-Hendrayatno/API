<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TampilanLoginController;
use App\Http\Controllers\AkunController;

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

// Route::get('/admin', function () {
//     return view('/layouts/template');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Route::group(["middleware" => ["admin"]], function() {
    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);

    Route::prefix("admin")->group(function() {

        Route::get("/dashboard", [AdminController::class, "dashboard"]);

        Route::prefix("pelatih")->group(function() {
            Route::get("/", [PelatihController::class, "index"]);
            Route::post("/store", [PelatihController::class, "store"]);
            Route::get("/tambah_data", [PelatihController::class, "tambah_data"]);
            Route::get("/edit/{id}", [PelatihController::class, "edit"]);
            Route::get("/detail/{id}", [PelatihController::class, "detail"]);
            Route::post("/hapus/", [PelatihController::class, "destroy"]);
            Route::post("/update", [PelatihController::class, "update"]);
        });

        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });

    });

    Route::prefix("users")->group(function() {
        Route::get("/", [AkunController::class, "index"]);
        Route::post("/tambah/", [AkunController::class, "tambah"]);
        Route::post("/hapus", [AkunController::class, "hapus"]);
        Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
        Route::post("/simpan", [AkunController::class, "simpan"]);
    });

// });

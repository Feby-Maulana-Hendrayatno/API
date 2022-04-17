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

Route::prefix("admin")->group(function () {

    Route::get("/dashboard", [AdminController::class, "dashboard"]);

    Route::prefix("users")->group(function () {
        Route::get("/", [AkunController::class, "index"]);
        Route::post("/tambah/", [AkunController::class, "tambah"]);
        Route::post("/hapus", [AkunController::class, "hapus"]);
        Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
        Route::post("/simpan", [AkunController::class, "simpan"]);
    });
});

Route::prefix("users")->group(function () {
    Route::get("/", [AkunController::class, "index"]);
    Route::post("/tambah/", [AkunController::class, "tambah"]);
    Route::post("/hapus", [AkunController::class, "hapus"]);
    Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
    Route::post("/simpan", [AkunController::class, "simpan"]);
});

Route::prefix("rumah")->group(function () {
    Route::get('/', [RumahController::class, 'index']);
    Route::get('/tambah', [RumahController::class, 'create']);
    Route::post('/', [RumahController::class, 'store']);
    Route::get('/edit/{id}', [RumahController::class, 'edit']);
    Route::put('/update/{id}', [RumahController::class, 'update']);
    Route::delete('/hapus/{id}', [RumahController::class, 'destroy']);
});

// });

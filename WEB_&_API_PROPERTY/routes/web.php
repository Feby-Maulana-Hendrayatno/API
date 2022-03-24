<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\RumahController;

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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(["middleware" => ["admin"]], function() {

Route::prefix("admin")->group(function () {

    Route::get("/dashboard", [AdminController::class, "dashboard"]);

    Route::prefix("pelatih")->group(function () {
        Route::get("/", [PelatihController::class, "index"]);
        Route::post("/store", [PelatihController::class, "store"]);
        Route::get("/tambah_data", [PelatihController::class, "tambah_data"]);
        Route::get("/edit/{id}", [PelatihController::class, "edit"]);
        Route::get("/detail/{id}", [PelatihController::class, "detail"]);
        Route::post("/hapus", [PelatihController::class, "destroy"]);
        Route::post("/update", [PelatihController::class, "update"]);
    });

    // Route::prefix("rumah")->group(function () {
    //     Route::get("/", [RumahController::class, "index"]);
    //     Route::post("/store", [RumahController::class, "store"]);
    //     Route::get("/tambah_rumah" . [RumahController::class, "tambah_data"]);
    //     Route::get("/edit/{id}", [RumahController::class, "edit_rumah"]);
    //     Route::post("/hapus", [RumahController::class, "destroy"]);
    //     Route::post("/update", [RumahController::class, "update"]);
    // });
});

// });

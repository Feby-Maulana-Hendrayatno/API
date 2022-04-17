<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TampilanLoginController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;

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

<<<<<<< HEAD
Route::group(["middleware" => ["guest"]], function() {
=======
// Route::get('/admin', function () {
//     return view('/layouts/template');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Route::group(["middleware" => ["admin"]], function() {
<<<<<<< HEAD
Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);
=======
>>>>>>> 84399849b777d3416fb545bbbc9614f94a3aa252
    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);
    Route::post("/login", [LoginController::class, "post_login"]);
});
>>>>>>> 65a5966a9465743ad8da85dcba4543130db1c013

<<<<<<< HEAD

Route::group(["middleware" => ["admin"]], function() {
=======
Route::prefix("admin")->group(function () {

    Route::get("/dashboard", [AdminController::class, "dashboard"]);

<<<<<<< HEAD
    Route::prefix("users")->group(function () {
=======
<<<<<<< HEAD
    Route::prefix("pelatih")->group(function () {
        Route::get("/", [PelatihController::class, "index"]);
        Route::post("/store", [PelatihController::class, "store"]);
        Route::get("/tambah_data", [PelatihController::class, "tambah_data"]);
        Route::get("/edit/{id}", [PelatihController::class, "edit"]);
        Route::get("/detail/{id}", [PelatihController::class, "detail"]);
        Route::post("/hapus", [PelatihController::class, "destroy"]);
        Route::post("/update", [PelatihController::class, "update"]);
    });
});
=======
        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });
>>>>>>> 84399849b777d3416fb545bbbc9614f94a3aa252

    
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
>>>>>>> 65a5966a9465743ad8da85dcba4543130db1c013
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

    Route::get("/logout", [LoginController::class, "logout"]);
    
});

// Route::prefix("users")->group(function() {
    //     Route::get("/", [AkunController::class, "index"]);
    //     Route::post("/tambah/", [AkunController::class, "tambah"]);
    //     Route::post("/hapus", [AkunController::class, "hapus"]);
    //     Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
    //     Route::post("/simpan", [AkunController::class, "simpan"]);
    // });
    
    Route::group(["middleware" => ["guest"]], function() {
        
        Route::prefix("admin")->group(function() {
            
            Route::get("/login", [LoginController::class, "login"]);
            
            Route::post("/post_login", [LoginController::class, "post_login"] );
            
        });
        
    });    
});

Route::prefix("owner")->group(function() {
    Route::get("/dashboard", [OwnerController::class, "dashboard"]);
});





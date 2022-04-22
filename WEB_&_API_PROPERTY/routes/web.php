<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TampilanLoginController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RegisterController;


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


Route::group(["middleware" => ["admin"]], function() {

        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });

});



    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);
    Route::post("/register", [RegisterController::class, "tambah"]);
    Route::post("/login", [LoginController::class, "post_login"]);

        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });



// Route::prefix("admin")->group(function() {

//     Route::get("/dashboard", [AdminController::class, "dashboard"]);

//     Route::prefix("pelatih")->group(function() {
//         Route::get("/", [PelatihController::class, "index"]);
//         Route::post("/store", [PelatihController::class, "store"]);
//         Route::get("/tambah_data", [PelatihController::class, "tambah_data"]);
//         Route::get("/edit/{id}", [PelatihController::class, "edit"]);
//         Route::get("/detail/{id}", [PelatihController::class, "detail"]);
//         Route::post("/hapus/", [PelatihController::class, "destroy"]);
//         Route::post("/update", [PelatihController::class, "update"]);
//     });

//     Route::prefix("users")->group(function() {

//         Route::get("/", [AkunController::class, "index"]);
//         Route::post("/tambah/", [AkunController::class, "tambah"]);
//         Route::post("/hapus", [AkunController::class, "hapus"]);
//         Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
//         Route::post("/simpan", [AkunController::class, "simpan"]);
//     });
// });

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
    Route::get("/login", [LoginController::class, "login"]);
    Route::post("/post_login", [LoginController::class, "post_login"] );

    Route::group(["middleware" => ["admin"]], function() {

    Route::prefix("admin")->group(function() {

    Route::get("/dashboard", [AdminController::class, "dashboard"]);
    Route::get("/logout", [LoginController::class, "logout"]);


        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });

        Route::prefix("role")->group(function() {
            Route::get("/", [RoleController::class, "index"]);
            Route::post("/tambah/", [RoleController::class, "tambah"]);
            Route::post("/hapus", [RoleController::class, "hapus"]);
            Route::get("/edit/{id_role}", [RoleController::class, "edit"]);
            Route::post("/simpan", [RoleController::class, "simpan"]);
        });

    });

    Route::prefix("users")->group(function() {
        Route::get("/", [AkunController::class, "index"]);
        Route::post("/tambah/", [AkunController::class, "tambah"]);
        Route::post("/hapus", [AkunController::class, "hapus"]);
        Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
        Route::post("/simpan", [AkunController::class, "simpan"]);
    });

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





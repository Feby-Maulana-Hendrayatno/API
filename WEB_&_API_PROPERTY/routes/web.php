<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
<<<<<<< HEAD
use App\Http\Controllers\TampilanLoginController;
use App\Http\Controllers\AkunController;
=======
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TampilanLoginController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;
<<<<<<< HEAD
use App\Http\Controllers\RoleController;

=======
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
>>>>>>> 0fe83b964b5d6ee9e026a0e284216b5cf120cdbf

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


Route::group(["middleware" => ["guest"]], function() {
<<<<<<< HEAD
    
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Auth::routes();
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    
=======

// Route::get('/admin', function () {
//     return view('/layouts/template');
// });

<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
>>>>>>> a01ae1a (baru)
=======
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff

// Route::group(["middleware" => ["admin"]], function() {
    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);

Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);


    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);
    Route::post("/login", [LoginController::class, "post_login"]);
});

Route::group(["middleware" => ["admin"]], function() {

Route::prefix("admin")->group(function () {

    Route::get("/dashboard", [AdminController::class, "dashboard"]);

<<<<<<< HEAD
<<<<<<< HEAD
=======

    Route::prefix("users")->group(function () {

>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
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

    });

>>>>>>> 0fe83b964b5d6ee9e026a0e284216b5cf120cdbf
    Route::prefix("users")->group(function() {
        Route::get("/", [AkunController::class, "index"]);
        Route::post("/tambah/", [AkunController::class, "tambah"]);
        Route::post("/hapus", [AkunController::class, "hapus"]);
        Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
        Route::post("/simpan", [AkunController::class, "simpan"]);
    });
<<<<<<< HEAD
    
    Route::get("/login", [TampilanLoginController::class, "TampilanLogin"]);
    Route::get("/register", [TampilanLoginController::class, "TampilanRegistrasi"]);
    Route::post("/register", [AkunController::class, "tambah"]);
    Route::post("/login", [LoginController::class, "post_login"]);
=======
>>>>>>> a01ae1a (baru)

        Route::prefix("users")->group(function() {
            Route::get("/", [AkunController::class, "index"]);
            Route::post("/tambah/", [AkunController::class, "tambah"]);
            Route::post("/hapus", [AkunController::class, "hapus"]);
            Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
            Route::post("/simpan", [AkunController::class, "simpan"]);
        });



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

>>>>>>> 0fe83b964b5d6ee9e026a0e284216b5cf120cdbf
});

// Route::prefix("users")->group(function() {
    //     Route::get("/", [AkunController::class, "index"]);
    //     Route::post("/tambah/", [AkunController::class, "tambah"]);
    //     Route::post("/hapus", [AkunController::class, "hapus"]);
    //     Route::get("/edit/{id_role}", [AkunController::class, "edit"]);
    //     Route::post("/simpan", [AkunController::class, "simpan"]);
    // });

    Route::get("/login", [LoginController::class, "login"]);
    Route::post("/post_login", [LoginController::class, "post_login"] );

<<<<<<< HEAD
Route::group(["middleware" => ["admin"]], function() {
    

    
    
    
    Route::prefix("admin")->group(function() {
        
        Route::get("/dashboard", [AdminController::class, "dashboard"]);
        Route::get("/logout", [LoginController::class, "logout"]);
        
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
=======
        });
>>>>>>> 0fe83b964b5d6ee9e026a0e284216b5cf120cdbf

Route::prefix("owner")->group(function() {
    Route::get("/dashboard", [OwnerController::class, "dashboard"]);
});





<?php

use App\Http\Controllers\RumahController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiSyaratController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/data_rumah', [RumahController::class, 'index']);
Route::get('/transaksi', [TransactionController::class, 'index']);
Route::get('/user', [ApiUserController::class, 'index']);
// Route::post('/php transaction', [TransactionController::class, 'store']);
// Route::get('/transaction/{id}', [TransactionController::class, 'show']);
// Route::put('/transaction/{id}', [TransactionController::class, 'update']);
// Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);

// Route::resource('/transaction', TransactionController::class)->except(['create', 'edit']);

// except supaya link tidak bisa diakses



// Route::post('login', [ApiLoginController::class, "login"] );
// Route::group(['middleware' => ['throttle:60,1', 'LogVisits']], function () {
//     Route::group(['middleware' => ['auth:api']], function () {
//         Route::get('user', 'ApiUserController@index');
//     });
//     Route::post('login' , 'ApiLoginController@login');
// });










//api login
Route::post('login', [ApiLoginController::class, "login"] );

//api daftar
Route::post('/user', [ApiUserController::class, 'store']);

// //api Syarat
// Route::resource('/syarat', ApiSyaratController::class,);


// midleware
// Route::group(['middleware' => ['throttle:60,1', 'LogVisits']] ,function () {
//     Route::post('/user', [ApiUserController::class, 'store']);
//     Route::post('login', [ApiLoginController::class, "login"] );

//     Route::group(['middleware' => ['throttle:60,1', 'LogVisits']] ,function () {
//         Route::get('user', 'ApiUserController');
//         Route::resource('/syarat', ApiSyaratController::class,);
//     });
// });

Route::get('/rumah', [ApiRumahController::class, 'index']);
Route::get('/rumah/tambah', [ApiRumahController::class, 'create']);
Route::post('/rumah', [ApiRumahController::class, 'store']);
Route::get('/rumah/{id}/edit', [ApiRumahController::class, 'edit']);
Route::put('/rumah/{id}', [ApiRumahController::class, 'show']);
Route::put('/rumah/{id}', [ApiRumahController::class, 'update']);
Route::delete('/rumah/{id}', [ApiRumahController::class, 'destroy']);

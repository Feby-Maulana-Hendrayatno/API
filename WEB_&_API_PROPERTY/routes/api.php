<?php

use App\Http\Controllers\RumahController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiSyaratController;
use App\Http\Controllers\ApiProfileController;

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
Route::get('/profile', [ApiProfileController::class, 'index']);
Route::post('/profile', [ApiProfileController::class, 'index']);
// Route::post('/php transaction', [TransactionController::class, 'store']);
// Route::get('/transaction/{id}', [TransactionController::class, 'show']);
// Route::put('/transaction/{id}', [TransactionController::class, 'update']);
// Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);

// Route::resource('/transaction', TransactionController::class)->except(['create', 'edit']);

// except supaya link tidak bisa diakses



// Route::post('login', [ApiLoginController::class, "login"] );
// Route::group(['middleware' => ['throttle:60,1', 'LogVisits']], function () {
//     Route::group(['middleware' => ['auth:api']], function () {
//         Route::get('user', 'ApiUserController::class, "index');
//     });
//     Route::post('login' , 'ApiLoginController::class, "login');
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

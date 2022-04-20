<?php

use App\Http\Controllers\RumahController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiSyaratController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PropertyController;
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff

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
<<<<<<< HEAD
// });
=======
// });

Route::post('/login', [ApiLoginController::class, "login"] );

Route::get('/propertys', [PropertyController::class, "showAllProperty"]);

Route::get('/propertys/{id}', [PropertyController::class, "showOneProperty"]);

Route::post('/propertys', [PropertyController::class, "create"]);

Route::delete('/propertys/{id}', [PropertyController::class, "delete"]);

Route::put('/propertys/{id}', [PropertyController::class, "update"]);

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('property', ['uses' => 'PropertyController@showAllPropertys']);

    $router->get('property/{id}', ['uses' => 'PropertyController@showOnePropertys']);

    $router->post('property', ['uses' => 'PropertyController@create']);

    $router->delete('property/{id}', ['uses' => 'PropertyController@delete']);

    $router->put('property/{id}', ['uses' => 'PropertyController@update']);
});
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff

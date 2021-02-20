<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('/miembros','App\Http\Controllers\MiembroController');
// Route::apiResource('/miembro/{id}','App\Http\Controllers\MiembroController');

Route::post('v1/auth/login', 'App\Http\Controllers\Auth\JwtController@login');

Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1', 'namespace' => 'App\Controllers'], function () {

    Route::post('auth/refresh', 'Auth\JwtController@refreshToken');
    Route::post('auth/logout', 'Auth\JwtController@logout');
});

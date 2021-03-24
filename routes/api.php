<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\MemberController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::get('/responsables',[ResponsableController::class, 'index']);
Route::post('/responsables/add',[ResponsableController::class, 'store']);
Route::get('/responsables/{id}',[ResponsableController::class, 'show']);
Route::put('/responsable/edit/{id}',[ResponsableController::class, 'update']);

Route::get('/members',[MemberController::class, 'index']);
Route::get('/member/{id}',[MemberController::class, 'show']);
Route::post('/members/add',[MemberController::class, 'store']);
Route::put('/member/edit/{id}',[MemberController::class, 'update']);


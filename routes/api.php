<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\GroupController;
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


Route::group(['middleware' => ['jwt.verify']], function(){

    Route::get('/responsables',[ResponsableController::class, 'index']);
    Route::post('/responsables/add',[ResponsableController::class, 'store']);
    Route::get('/responsables/{id}',[ResponsableController::class, 'show']);
    Route::put('/responsables/update/{id}',[ResponsableController::class, 'update']);
    Route::delete('/responsables/delete/{id}', [ResponsableController::class, 'destroy']);
    
    Route::get('/members',[MemberController::class, 'index']);
    Route::post('/members/add',[MemberController::class, 'store']);
    Route::get('/member/{id}',[MemberController::class, 'show']);
    Route::put('/member/edit/{id}',[MemberController::class, 'update']);
    Route::delete('/member/delete/{id}', [MemberController::class, 'destroy']);
    
    Route::get('/groups',[GroupController::class, 'index']);
    Route::post('/groups/add',[GroupController::class, 'store']);
    Route::get('/groups/{id}',[GroupController::class, 'show']);
    Route::put('/groups/edit/{id}',[GroupController::class, 'update']);
    Route::delete('/group/delete/{id}', [GroupController::class, 'destroy']);
    
    Route::get('/activities',[ActivityController::class, 'index']);
    Route::post('/activities/add',[ActivityController::class, 'store']);
    Route::put('/activities/edit/{id}',[MovementsController::class, 'update']);
    Route::delete('/activities/delete/{id}',[ActivityController::class, 'destroy']);
    Route::get('/activities/{id}',  [ActivityController::class, 'getActivityMembers']);
    Route::post('/activities/assign',[ActivityController::class, 'addActivityToMember']);
    Route::delete('/activities/unassign', [ActivityController::class, 'quitActivityFromMember']);

  
});


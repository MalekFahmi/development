<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\managercontroller;
use App\Http\Controllers\Admin\schoolcontroller;
use App\Http\Controllers\Admin\SuccsessRatingsController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Manager\feescontroller;
use App\Http\Controllers\Manager\levelcontroller;
use App\Http\Controllers\Manager\schoolteachercontroller;
use App\Http\Controllers\Manager\teachercontroller;
use App\Http\Controllers\Manager\ManagerAuthController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\EvaluationController;
use App\Models\Admin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('userregister', [UserAuthController::class,'register']);
Route::post('Login', [UserAuthController::class,'login']);
Route::middleware('auth:student')->group(function() {
    Route::get('/student', [UserAuthController::class, 'getUser']);
    Route::put('/student', [UserAuthController::class, 'updateUser']);
    Route::post('/slogout', [UserAuthController::class, 'logout']);
    Route::apiResource('comment', CommentController::class);
    Route::apiResource('evaluation', EvaluationController::class);
});

Route::post('managerLogin', [ManagerAuthController::class,'login']);
Route::middleware('auth:manager')->group(function() {
    Route::get('/manager', [ManagerAuthController::class, 'getUser']);
    Route::put('/manager', [ManagerAuthController::class, 'updateUser']);
    Route::post('/mlogout', [ManagerAuthController::class, 'logout']);
    Route::apiResource('schoolteacher', schoolteachercontroller::class);
    Route::apiResource('grades', levelcontroller::class);
    Route::apiResource('fees', feescontroller::class);
    Route::apiResource('teachers', teachercontroller::class);
});

Route::post('adminLogin', [AdminAuthController::class,'login']);
Route::middleware('auth:admin')->group(function() {
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::apiResource('managers', managercontroller::class);
    Route::apiResource('schools', schoolcontroller::class);
    Route::apiResource('Succsess_rating', SuccsessRatingsController::class);
});






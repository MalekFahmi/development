<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\managercontroller;
use App\Http\Controllers\Admin\schoolcontroller;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\Manager\levelcontroller;
use App\Http\Controllers\Manager\schoolteachercontroller;
use App\Http\Controllers\Manager\teachercontroller;
use App\Http\Controllers\SuccsessRatingsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('managers', managercontroller::class);

Route::apiResource('schools', schoolcontroller::class);

Route::apiResource('teachers', teachercontroller::class);

Route::apiResource('grades', levelcontroller::class);

Route::apiResource('schoolteacher', schoolteachercontroller::class);

Route::apiResource('comment', CommentController::class);

Route::apiResource('Succsess_rating', SuccsessRatingsController::class);





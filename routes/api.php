<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
 Route::post('/register',[AuthController::class,'register']);
 Route::post('/login',[AuthController::class,'login']);
 Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');


 Route::apiResource('departments', DepartmentController::class);
Route::apiResource('rooms', RoomController::class);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('operations', SurgicalOperationController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SurgeryController;

 Route::post('/register',[AuthController::class,'register']);
 Route::post('/login',[AuthController::class,'login']);
 Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('rooms', RoomController::class);
Route::get('rooms/availability', [RoomController::class, 'availableRooms']);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('patients', PatientController::class);
Route::put('patients/{id}/discharge', [PatientController::class, 'discharge']);
Route::apiResource('surgeries', SurgeryController::class);



/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/empleado/roles',[App\Http\Controllers\EmpleadoController::class,'roles']);
Route::get('/empleado/area',[App\Http\Controllers\EmpleadoController::class,'area']);
Route::post('/empleado/create',[App\Http\Controllers\EmpleadoController::class,'create']);
Route::post('/empleado/asignar_roles',[App\Http\Controllers\EmpleadoController::class,'roles_empleado']);
Route::get('/empleado/get_empleados',[App\Http\Controllers\EmpleadoController::class,'get_empleados']);
Route::post('/empleado/read_empleado',[App\Http\Controllers\EmpleadoController::class,'read_empleado']);
Route::post('/empleado/update',[App\Http\Controllers\EmpleadoController::class,'update']);
Route::post('/empleado/delete',[App\Http\Controllers\EmpleadoController::class,'delete']);




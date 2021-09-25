<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});



Route::get('/pneumatics',[\App\Http\Controllers\pneumaticController::class,'index']);
Route::delete('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'destroy']);
Route::get('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'edit']);
Route::post('/pneumatics/store',[\App\Http\Controllers\pneumaticController::class,'store']);
Route::post('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'update']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

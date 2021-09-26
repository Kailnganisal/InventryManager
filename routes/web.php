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
    logger("session dom ".env('SESSION_DOMAIN'));
    return view('welcome');
});



Route::middleware('auth:sanctum')->get('/pneumatics',[\App\Http\Controllers\pneumaticController::class,'index']);
Route::middleware('auth:sanctum')->delete('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'destroy']);
Route::middleware('auth:sanctum')->get('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'edit']);
Route::middleware('auth:sanctum')->post('/pneumatics/store',[\App\Http\Controllers\pneumaticController::class,'store']);
Route::middleware('auth:sanctum')->post('/pneumatics/{pneumaticPart}',[\App\Http\Controllers\pneumaticController::class,'update']);

Route::get('/getauthuser',[\App\Http\Controllers\AuthUserController::class,'index']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

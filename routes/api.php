<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProgramController;
use App\Http\Controllers\api\UniversitasController;
use App\Http\Controllers\api\RegisterController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'Register');
    Route::post('login', 'Login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('programs', ProgramController::class);
    Route::resource('universitas', UniversitasController::class);
    Route::get('search/{search}',[UniversitasController::class, 'search']);
});
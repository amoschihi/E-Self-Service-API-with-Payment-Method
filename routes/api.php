<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\CourseController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('request-password', [AuthController::class, 'resetPassword']);
Route::post('reset-password', [AuthController::class, 'changePassword']);
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
 
});

//Resources
Route::apiResources([
    'courses' => CourseController::class,
    'rooms' => RoomController::class,
    'roles' => RoleController::class
]);
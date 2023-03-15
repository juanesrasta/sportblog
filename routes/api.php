<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Api\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/** JUAN
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    Route::post('category', 'store');
   // Route::get('category/{id}', 'show');
	Route::put('editcategory/{id}', 'update');
    Route::delete('delcategory/{id}', 'destroy');
});

Route::controller(PublicationController::class)->group(function () {
    Route::get('publications', 'index');
    Route::post('publication', 'store');
   // Route::get('category/{id}', 'show');
	Route::put('editcategory/{id}', 'update');
    Route::delete('delcategory/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
    Route::post('user', 'store');
   // Route::get('category/{id}', 'show');
	Route::put('user/{id}', 'update');
    Route::delete('deluser/{id}', 'destroy');
});
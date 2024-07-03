<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\SubCategory\SubCategoryController;
use App\Http\Controllers\Api\Symptom\SymptomController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/my-profile', [ProfileController::class, 'profile']);
    Route::post('/update-profile', [ProfileController::class, 'updateProfile']);
});

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/{category}', 'show');
    });

Route::controller(SubCategoryController::class)
    ->group(function () {
        Route::get('/sub-categories', 'index');
        Route::get('/sub-categories/{subCategory}', 'show');
    });

Route::controller(SymptomController::class)
    ->group(function () {
        Route::get('/symptoms', 'index');
        Route::get('/symptoms/{symptom}', 'show');
        Route::get('/search-symptoms', 'search');
    });

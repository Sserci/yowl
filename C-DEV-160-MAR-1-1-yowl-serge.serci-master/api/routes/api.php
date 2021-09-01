<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ReviewsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;




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

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/reviews/{id}/comments', [ReviewsController::class, 'findComments']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('comments', CommentsController::class);
    Route::apiResource('categories', CategoriesController::class);
    Route::apiResource('reviews', ReviewsController::class);
    Route::apiResource('users', UserController::class);
    Route::get('count/users', [UserController::class, 'count']);
    Route::get('count/reviews', [ReviewsController::class, 'count']);
    Route::get('average/reviews', [ReviewsController::class, 'average']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/logout', [AuthController::class, 'logout']);
    
});

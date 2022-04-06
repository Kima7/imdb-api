<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('me', [AuthController::class, 'me'])->middleware(['auth:api']);
Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api']);

Route::resource('movies', MovieController::class)->middleware(['auth:api']);
Route::get('genres', [MovieController::class, 'genres'])->middleware(['auth:api']);
Route::get('genreFilter/{genre}', [MovieController::class, 'genreFilter'])->middleware(['auth:api']);
Route::get('movieSearch', [MovieController::class, 'movieSearch'])->middleware(['auth:api']);
Route::post('storeLike', [MovieController::class, 'storeLike'])->middleware(['auth:api']);
Route::post('storeComment', [MovieController::class, 'storeComment'])->middleware(['auth:api']);
Route::get('relatedMovies/{movie_id}', [MovieController::class, 'relatedMovies'])->middleware(['auth:api']);
Route::get('popularMovies', [MovieController::class, 'popularMovies'])->middleware(['auth:api']);
Route::post('addToWatchList', [MovieController::class, 'addToWatchList'])->middleware(['auth:api']);
Route::get('getWatchList', [MovieController::class, 'getWatchList'])->middleware(['auth:api']);
Route::delete('removeFromWatchList', [MovieController::class, 'removeFromWatchList'])->middleware(['auth:api']);

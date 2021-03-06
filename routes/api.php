<?php

use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('books', [BookControllerApi::class, 'getAllBooks']);
Route::get('books/{id}', [BookControllerApi::class, 'getBook']);

Route::get('chars/', [CharacterController::class, 'showCharacters']);
Route::get('comments/{id}', [CommentController::class, 'getComments']);
Route::post('comment', [CommentController::class, 'createComment']);

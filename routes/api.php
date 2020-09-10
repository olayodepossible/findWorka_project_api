<?php

use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\BooksController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('root', [BooksController::class, 'show']);
Route::get('books', [BookControllerApi::class, 'getAllBooks']);
Route::get('books/{id}', [BookControllerApi::class, 'getBook']);

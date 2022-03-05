<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/books', [BooksController::class, 'getAllBooks']);
    Route::get('/books/{id}', [BooksController::class, 'getSingleBook']);
    Route::post('/books', [BooksController::class, 'create']);
    Route::post('/books/{id}', [BooksController::class, 'update']);
    Route::delete('/books/{id}', [BooksController::class, 'delete']);
    Route::post('/books/{id}/delete', [BooksController::class, 'delete']);
    Route::get('/external-books', [BooksController::class, 'externalBooks']);
    
});

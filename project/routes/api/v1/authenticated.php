<?php
/**
 * Authenticated routes for Api
 * Prefix 'api/v1', middleware 'auth:api'
 * Namespace 'App\Http\Controllers\Api\v1'
 */

use App\Http\Controllers\Api\v1\Admin\BookController;
use App\Http\Controllers\Api\v1\LoanController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\Auth\LoginController;

Route::post('logout', [LoginController::class, 'logout']);

Route::get('/me', [UserController::class, 'me']);

Route::get('/admin/books', [BookController::class, 'index']);
Route::get('/admin/books/{book}', [BookController::class, 'show']);
Route::post('/admin/books', [BookController::class, 'store']);
Route::put('admin/books/{book}', [BookController::class, 'update']);
Route::delete('admin/books/{book}', [BookController::class, 'destroy']);

Route::get('loans', [LoanController::class, 'index']);
Route::get('loans{loan}', [LoanController::class, 'show']);
Route::post('loans/{loan}/devolution', [LoanController::class, 'devolution']);
Route::post('books/{book}/loan', [LoanController::class, 'loan']);

<?php
/**
 * Authenticated routes
 * Middleware 'auth'
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);

Route::get('pagination/users', [UserController::class, 'pagination'])
    ->name('pagination.users');

<?php
/**
 * Unauthenticated routes for Api
 * Prefix 'api/v1'
 * Namespace 'App\Http\Controllers\Api\v1'
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\LoginController;

Route::post('login', [LoginController::class, 'login']);

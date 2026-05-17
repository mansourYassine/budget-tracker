<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get("/login", [AuthenticationController::class, 'index']);
Route::get("/register", [AuthenticationController::class, 'register']);
Route::post("/register", [AuthenticationController::class, 'store']);

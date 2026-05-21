<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TransactionController;

Route::get("/login", [AuthenticationController::class, 'index']);
Route::get("/register", [AuthenticationController::class, 'register']);
Route::post("/register", [AuthenticationController::class, 'store']);

Route::view("/", "dashboard")->name('dashboard');

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get("/", [TransactionController::class, 'index'])->name('index');
    Route::get("/create", [TransactionController::class, 'create'])->name('create');
    Route::post("/store", [TransactionController::class, 'store'])->name('store');
});
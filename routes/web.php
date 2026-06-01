<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TransactionController;

Route::get("/login", [AuthenticationController::class, 'index'])->name('login');
Route::get("/register", [AuthenticationController::class, 'register'])->name('register');
Route::post("/register", [AuthenticationController::class, 'store'])->name('register.post');

Route::view("/", "dashboard")->name('dashboard');

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get("/", [TransactionController::class, 'index'])->name('index');
    Route::get("/create", [TransactionController::class, 'create'])->name('create');
    Route::post("/store", [TransactionController::class, 'store'])->name('store');
    Route::get("{id}/edit", [TransactionController::class, 'edit'])->name('edit');
    Route::put("{id}", [TransactionController::class, 'update'])->name('update');
    Route::delete("{id}", [TransactionController::class, 'destroy'])->name('destroy');
});
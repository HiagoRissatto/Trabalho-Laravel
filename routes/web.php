<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get('/users', [UserController::class, 'index'])
    ->name('admin.users.index');
    Route::get('/user/{user}', [UserController::class, 'show']);
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('register', [UserController::class, 'register']);
Route::post('store', [UserController::class, 'create'])->name('users.store');

Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('users.password.form');
Route::post('/forgot-password', [UserController::class, 'sendPasswordResetLink'])->name('users.password.email');
Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])->name('password.reset');
Route::post('/reset-password', [UserController::class, 'updatePassword'])->name('users.password.update');

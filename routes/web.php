<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RestaurantTableController;

// Redirect homepage based on authentication status
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('tables.index');
    }

    return redirect()->route('register');
});

// Guest routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Admin and staff can view tables
    Route::get('/tables', [RestaurantTableController::class, 'index'])
        ->name('tables.index');

    // Only admin can manage tables
    Route::middleware('role:admin')->group(function () {
        Route::get('/tables/create', [RestaurantTableController::class, 'create'])
            ->name('tables.create');

        Route::post('/tables', [RestaurantTableController::class, 'store'])
            ->name('tables.store');

        Route::get('/tables/{table}/edit', [RestaurantTableController::class, 'edit'])
            ->name('tables.edit');

        Route::put('/tables/{table}', [RestaurantTableController::class, 'update'])
            ->name('tables.update');

        Route::delete('/tables/{table}', [RestaurantTableController::class, 'destroy'])
            ->name('tables.destroy');
    });
}); 
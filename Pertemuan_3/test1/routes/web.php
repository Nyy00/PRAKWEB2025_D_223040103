<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'stats' => [
            'users' => User::count(),
            'categories' => Category::count(),
            'posts' => Post::count(),
        ],
    ]);
});

Route::view('/about', 'about');
Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/posts', DashboardPostController::class);
});

// Example Routes for N+1 Problem Demonstration (Optional - for learning)
Route::prefix('examples')->group(function () {
    Route::get('/comparison', [\App\Http\Controllers\ExampleN1Controller::class, 'comparison']);
    Route::get('/without-eager-loading', [\App\Http\Controllers\ExampleN1Controller::class, 'withoutEagerLoading']);
    Route::get('/with-eager-loading', [\App\Http\Controllers\ExampleN1Controller::class, 'withEagerLoading']);
    Route::get('/lazy-eager-loading', [\App\Http\Controllers\ExampleN1Controller::class, 'withLazyEagerLoading']);
});

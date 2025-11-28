<?php

use App\Http\Controllers\CategoryController;
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

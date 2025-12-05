<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Controller ini untuk demonstrasi N+1 Problem
 * JANGAN digunakan di production!
 */
class ExampleN1Controller extends Controller
{
    /**
     * ❌ BAD EXAMPLE: N+1 Problem
     * Akan menghasilkan banyak query
     */
    public function withoutEagerLoading()
    {
        // Enable query log untuk melihat semua queries
        DB::enableQueryLog();

        // Ambil 10 posts tanpa eager loading
        $posts = Post::limit(10)->get();

        // Loop dan akses relasi - ini akan trigger N+1 problem
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'title' => $post->title,
                'author' => $post->user->name,        // Query tambahan untuk setiap post
                'category' => $post->category->name,  // Query tambahan lagi
            ];
        }

        // Ambil semua queries yang dijalankan
        $queries = DB::getQueryLog();
        $queryCount = count($queries);

        return view('examples.n1-problem', [
            'method' => 'WITHOUT Eager Loading (N+1 Problem)',
            'posts' => $data,
            'queries' => $queries,
            'queryCount' => $queryCount,
            'explanation' => "Tanpa eager loading, Laravel melakukan 1 query untuk posts, 
                             lalu 1 query untuk setiap user, dan 1 query untuk setiap category. 
                             Total: 1 + (10 × 2) = 21 queries!"
        ]);
    }

    /**
     * ✅ GOOD EXAMPLE: Dengan Eager Loading
     * Hanya 3 queries total
     */
    public function withEagerLoading()
    {
        DB::enableQueryLog();

        // Ambil 10 posts DENGAN eager loading
        $posts = Post::with(['user', 'category'])->limit(10)->get();

        // Loop dan akses relasi - TIDAK ada query tambahan
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'title' => $post->title,
                'author' => $post->user->name,        // Sudah di-load, tidak ada query
                'category' => $post->category->name,  // Sudah di-load, tidak ada query
            ];
        }

        $queries = DB::getQueryLog();
        $queryCount = count($queries);

        return view('examples.n1-problem', [
            'method' => 'WITH Eager Loading (Solution)',
            'posts' => $data,
            'queries' => $queries,
            'queryCount' => $queryCount,
            'explanation' => "Dengan eager loading, Laravel melakukan 3 queries saja: 
                             1 untuk posts, 1 untuk semua users, 1 untuk semua categories. 
                             Total: 3 queries! Improvement: 85% lebih efisien!"
        ]);
    }

    /**
     * ✅ GOOD EXAMPLE: Lazy Eager Loading
     * Load relasi setelah model di-fetch
     */
    public function withLazyEagerLoading()
    {
        DB::enableQueryLog();

        // Ambil posts dulu
        $posts = Post::limit(10)->get();

        // Kemudian load relasi secara lazy
        $posts->load(['user', 'category']);

        // Loop dan akses relasi
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'title' => $post->title,
                'author' => $post->user->name,
                'category' => $post->category->name,
            ];
        }

        $queries = DB::getQueryLog();
        $queryCount = count($queries);

        return view('examples.n1-problem', [
            'method' => 'WITH Lazy Eager Loading',
            'posts' => $data,
            'queries' => $queries,
            'queryCount' => $queryCount,
            'explanation' => "Lazy eager loading berguna saat kita sudah punya model instance 
                             dan ingin load relasi setelahnya. Hasilnya sama efisien: 3 queries!"
        ]);
    }

    /**
     * Comparison page
     */
    public function comparison()
    {
        return view('examples.comparison');
    }
}

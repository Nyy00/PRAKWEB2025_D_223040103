<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
        // Eager Loading dengan with() untuk menghindari N+1 Problem
        $posts = Post::with(['user', 'category'])
            ->where('user_id', Auth::id())
            ->filter(request(['search']))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ], [
            'title.required' => 'Judul harus diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'category_id.required' => 'Kategori harus dipilih',
            'category_id.exists' => 'Kategori tidak valid',
            'excerpt.required' => 'Excerpt harus diisi',
            'body.required' => 'Konten harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = Auth::id();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('post-images', 'public');
            $validated['image'] = $path;
            
            // Debug: Log upload info
            \Log::info('Image uploaded', [
                'original_name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => $path,
                'full_path' => storage_path('app/public/' . $path)
            ]);
        }

        Post::create($validated);

        return redirect('/dashboard/posts')->with('success', 'Post berhasil ditambahkan!');
    }

    public function show(Post $post)
    {
        // Authorization: hanya pemilik yang bisa lihat
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Lazy Eager Loading dengan load()
        $post->load(['user', 'category']);

        return view('dashboard.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Authorization: hanya pemilik yang bisa edit
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        // Authorization: hanya pemilik yang bisa update
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ], [
            'title.required' => 'Judul harus diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'category_id.required' => 'Kategori harus dipilih',
            'category_id.exists' => 'Kategori tidak valid',
            'excerpt.required' => 'Excerpt harus diisi',
            'body.required' => 'Konten harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $post->update($validated);

        return redirect('/dashboard/posts')->with('success', 'Post berhasil diupdate!');
    }

    public function destroy(Post $post)
    {
        // Authorization: hanya pemilik yang bisa delete
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus gambar jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect('/dashboard/posts')->with('success', 'Post berhasil dihapus!');
    }
}

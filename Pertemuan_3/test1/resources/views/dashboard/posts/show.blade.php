@extends('layouts.dashboard')

@section('title', 'View Post')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="mb-6">
        <a href="/dashboard/posts" class="text-blue-600 hover:text-blue-900">← Back to Posts</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
        @endif
        
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center text-gray-600 text-sm mb-4 space-x-4">
                <span>By {{ $post->user->name }}</span>
                <span>•</span>
                <span>{{ $post->category->name }}</span>
                <span>•</span>
                <span>{{ $post->published_at ? $post->published_at->format('d M Y') : 'Not published' }}</span>
            </div>

            <div class="border-t border-gray-200 pt-4 mb-4">
                <h3 class="font-semibold mb-2">Excerpt:</h3>
                <p class="text-gray-700">{{ $post->excerpt }}</p>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <h3 class="font-semibold mb-2">Content:</h3>
                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="/dashboard/posts/{{ $post->id }}/edit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Post
                </a>
                <form action="/dashboard/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="mb-6">
        <a href="/dashboard/posts" class="text-blue-600 hover:text-blue-900">← Back to Posts</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Create New Post</h2>

        <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-dashboard.posts.form :categories="$categories" />
            
            <div class="flex justify-end space-x-4">
                <a href="/dashboard/posts" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

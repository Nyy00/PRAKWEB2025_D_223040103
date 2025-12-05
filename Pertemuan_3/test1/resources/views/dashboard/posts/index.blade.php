@extends('layouts.dashboard')

@section('title', 'My Posts')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">My Posts</h2>
        <a href="/dashboard/posts/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Add New Post
        </a>
    </div>

    <!-- Search Form -->
    <form action="/dashboard/posts" method="GET" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Search posts..." 
                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Search
            </button>
            @if(request('search'))
                <a href="/dashboard/posts" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Clear
                </a>
            @endif
        </div>
    </form>

    <!-- Posts Table Component -->
    <x-dashboard.posts.table :posts="$posts" />

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection

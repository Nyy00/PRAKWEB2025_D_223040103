@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="border-4 border-dashed border-gray-200 rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-4">Welcome to Dashboard, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600 mb-4">Manage your posts and content from here.</p>
        <a href="/dashboard/posts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Go to My Posts
        </a>
    </div>
</div>
@endsection

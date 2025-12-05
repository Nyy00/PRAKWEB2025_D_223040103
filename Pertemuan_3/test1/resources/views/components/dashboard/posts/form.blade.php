@props(['categories', 'post' => null])

<div class="space-y-6">
    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}" required
            class="w-full px-4 py-2 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Category -->
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
        <select name="category_id" id="category_id" required
            class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Excerpt -->
    <div>
        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt *</label>
        <textarea name="excerpt" id="excerpt" rows="3" required
            class="w-full px-4 py-2 border @error('excerpt') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Body -->
    <div>
        <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
        <textarea name="body" id="body" rows="10" required
            class="w-full px-4 py-2 border @error('body') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Upload (Flowbite Style) -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Post Image</label>
        @if(isset($post) && $post->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current image" class="h-32 w-auto rounded">
                <p class="text-sm text-gray-500 mt-2">Current image (will be replaced if you upload a new one)</p>
            </div>
        @endif
        <div class="flex items-center justify-center w-full">
            <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 @error('image') border-red-500 @else border-gray-300 @enderror border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 2MB)</p>
                </div>
                <input id="image" name="image" type="file" class="hidden" accept="image/*" />
            </label>
        </div>
        @error('image')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Published At -->
    <div>
        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Published Date</label>
        <input type="datetime-local" name="published_at" id="published_at" 
            value="{{ old('published_at', $post && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
            class="w-full px-4 py-2 border @error('published_at') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('published_at')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

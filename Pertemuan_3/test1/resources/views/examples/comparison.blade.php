<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N+1 Problem Comparison</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">N+1 Problem Demonstration</h1>
        
        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-8">
            <p class="font-bold"> Catatan:</p>
            <p>Halaman ini untuk demonstrasi pembelajaran. Install Laravel Debugbar untuk melihat queries secara real-time!</p>
            <code class="block mt-2 bg-gray-800 text-white p-2 rounded">composer require barryvdh/laravel-debugbar --dev</code>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Without Eager Loading -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4 mx-auto">
                    <span class="text-3xl">❌</span>
                </div>
                <h2 class="text-xl font-bold text-center mb-4 text-red-600">Without Eager Loading</h2>
                <p class="text-gray-600 text-center mb-4">N+1 Problem - Banyak query tidak efisien</p>
                <div class="text-center mb-4">
                    <span class="text-4xl font-bold text-red-600">~21</span>
                    <p class="text-sm text-gray-500">queries</p>
                </div>
                <a href="/examples/without-eager-loading" class="block w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                    Test This Method
                </a>
            </div>

            <!-- With Eager Loading -->
            <div class="bg-white rounded-lg shadow-lg p-6 border-4 border-green-500">
                <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 mx-auto">
                    <span class="text-3xl">✅</span>
                </div>
                <h2 class="text-xl font-bold text-center mb-4 text-green-600">With Eager Loading</h2>
                <p class="text-gray-600 text-center mb-4">Solusi terbaik - Sangat efisien</p>
                <div class="text-center mb-4">
                    <span class="text-4xl font-bold text-green-600">3</span>
                    <p class="text-sm text-gray-500">queries</p>
                </div>
                <a href="/examples/with-eager-loading" class="block w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">
                    Test This Method
                </a>
                <div class="mt-2 text-center">
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">RECOMMENDED</span>
                </div>
            </div>

            <!-- Lazy Eager Loading -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 mx-auto">
                    <span class="text-3xl">✅</span>
                </div>
                <h2 class="text-xl font-bold text-center mb-4 text-blue-600">Lazy Eager Loading</h2>
                <p class="text-gray-600 text-center mb-4">Load relasi setelah fetch - Efisien</p>
                <div class="text-center mb-4">
                    <span class="text-4xl font-bold text-blue-600">3</span>
                    <p class="text-sm text-gray-500">queries</p>
                </div>
                <a href="/examples/lazy-eager-loading" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                    Test This Method
                </a>
            </div>
        </div>

        <!-- Code Examples -->
        <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Code Examples</h2>
            
            <div class="space-y-6">
                <!-- Bad Example -->
                <div>
                    <h3 class="text-lg font-semibold mb-2 text-red-600">❌ Bad: Without Eager Loading</h3>
                    <pre class="bg-gray-800 text-white p-4 rounded overflow-x-auto"><code>$posts = Post::limit(10)->get(); // 1 query

foreach ($posts as $post) {
    echo $post->user->name;      // +10 queries
    echo $post->category->name;  // +10 queries
}

// Total: 21 queries 😱</code></pre>
                </div>

                <!-- Good Example 1 -->
                <div>
                    <h3 class="text-lg font-semibold mb-2 text-green-600">✅ Good: With Eager Loading</h3>
                    <pre class="bg-gray-800 text-white p-4 rounded overflow-x-auto"><code>$posts = Post::with(['user', 'category'])->limit(10)->get(); // 3 queries

foreach ($posts as $post) {
    echo $post->user->name;      // No additional query
    echo $post->category->name;  // No additional query
}

// Total: 3 queries 🚀</code></pre>
                </div>

                <!-- Good Example 2 -->
                <div>
                    <h3 class="text-lg font-semibold mb-2 text-blue-600">✅ Good: Lazy Eager Loading</h3>
                    <pre class="bg-gray-800 text-white p-4 rounded overflow-x-auto"><code>$posts = Post::limit(10)->get(); // 1 query

$posts->load(['user', 'category']); // +2 queries

foreach ($posts as $post) {
    echo $post->user->name;      // No additional query
    echo $post->category->name;  // No additional query
}

// Total: 3 queries 🚀</code></pre>
                </div>
            </div>
        </div>

        <!-- Performance Comparison -->
        <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Performance Comparison</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Method</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Queries</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time (est.)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Efficiency</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="bg-red-50">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Without Eager Loading</td>
                            <td class="px-6 py-4 whitespace-nowrap text-red-600 font-bold">21</td>
                            <td class="px-6 py-4 whitespace-nowrap">~50ms</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Poor</span>
                            </td>
                        </tr>
                        <tr class="bg-green-50">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">With Eager Loading</td>
                            <td class="px-6 py-4 whitespace-nowrap text-green-600 font-bold">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">~15ms</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Excellent</span>
                            </td>
                        </tr>
                        <tr class="bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">Lazy Eager Loading</td>
                            <td class="px-6 py-4 whitespace-nowrap text-blue-600 font-bold">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">~15ms</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">Excellent</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/dashboard" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                ← Back to Dashboard
            </a>
        </div>
    </div>
</body>
</html>

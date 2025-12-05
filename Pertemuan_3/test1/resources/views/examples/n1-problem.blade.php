<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $method }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="/examples/comparison" class="text-blue-600 hover:text-blue-900">← Back to Comparison</a>
        </div>

        <h1 class="text-3xl font-bold mb-4">{{ $method }}</h1>
        
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Query Statistics</h2>
                <span class="text-3xl font-bold {{ $queryCount > 10 ? 'text-red-600' : 'text-green-600' }}">
                    {{ $queryCount }} queries
                </span>
            </div>
            
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4">
                <p class="text-gray-700">{{ $explanation }}</p>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Posts Retrieved:</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Author</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 text-sm">{{ Str::limit($post['title'], 50) }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $post['author'] }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $post['category'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">All Queries Executed ({{ $queryCount }} total)</h2>
            <div class="space-y-4">
                @foreach($queries as $index => $query)
                    <div class="border-l-4 {{ $index === 0 ? 'border-blue-500' : 'border-gray-300' }} pl-4">
                        <div class="flex justify-between items-start mb-2">
                            <span class="font-semibold text-sm">Query #{{ $index + 1 }}</span>
                            <span class="text-xs text-gray-500">{{ $query['time'] }}ms</span>
                        </div>
                        <pre class="bg-gray-800 text-white p-3 rounded text-xs overflow-x-auto">{{ $query['query'] }}</pre>
                        @if(!empty($query['bindings']))
                            <div class="mt-2 text-xs text-gray-600">
                                <strong>Bindings:</strong> {{ json_encode($query['bindings']) }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8 flex justify-center space-x-4">
            <a href="/examples/comparison" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                ← Back to Comparison
            </a>
            <a href="/dashboard" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Go to Dashboard
            </a>
        </div>
    </div>
</body>
</html>

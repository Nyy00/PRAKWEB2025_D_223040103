<x-layout>
    <x-slot:title>Kategori</x-slot:title>

    <div class="space-y-8">
        <div class="text-center space-y-3">
                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Kategori
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Jelajahi berbagai kategori dan temukan konten yang menarik
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <div class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xl font-bold shadow-lg group-hover:scale-110 transition-transform duration-300">
                                {{ strtoupper(substr($category->name, 0, 1)) }}
                            </div>
                            <span class="text-xs uppercase tracking-wider text-slate-400 font-semibold">Kategori</span>
                        </div>

                        <div>
                            <h2 class="text-2xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
                                {{ $category->name }}
                            </h2>
                        </div>

                            <div class="flex items-center gap-2 pt-4 border-t border-slate-100">
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-100 text-indigo-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ $category->posts_count }}</span>
                            </div>
                            <span class="text-xs text-slate-500">postingan</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($categories->isEmpty())
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <p class="text-slate-500 text-lg">Belum ada kategori.</p>
            </div>
        @endif
    </div>
</x-layout>


<x-layout>
    <x-slot:title>Postingan</x-slot:title>

    <div class="space-y-8">
        <div class="text-center space-y-3">
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Postingan Terbaru
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Jelajahi semua postingan menarik dengan relasi pengguna & kategori
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                    
                    <div class="p-6 space-y-4">
                        <!-- Author Info dengan Icon User Inline -->
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white shadow-md">
                                    <x-icons.user class="w-5 h-5 text-white" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-slate-900 truncate">{{ $post->user->name }}</p>
                                <p class="text-xs text-slate-500">{{ '@' . $post->user->username }}</p>
                            </div>
                        </div>

                        <!-- Category & Date -->
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700 hover:bg-indigo-200 transition-colors">
                                <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
                                {{ $post->category->name }}
                            </span>
                            <span class="text-xs text-slate-400">•</span>
                            <span class="text-xs text-slate-500 flex items-center gap-1">
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $post->created_at->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <!-- Title -->
                        <div>
                            <h2 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h2>
                        </div>

                        <!-- Excerpt -->
                        <p class="text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt ?? \Illuminate\Support\Str::limit($post->body, 150) }}
                        </p>

                        <!-- Read More Button -->
                        <div class="pt-2 border-t border-slate-100">
                            <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 flex items-center gap-2 group/btn">
                                Baca selengkapnya
                                <svg class="w-4 h-4 text-indigo-600 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <p class="text-slate-500 text-lg">Belum ada postingan.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
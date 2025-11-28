<x-layout>
    <x-slot:title>Postingan</x-slot:title>

    <div class="space-y-8">
        <div class="text-center space-y-3">
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Postingan Terbaru
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Jelajahi semua postingan menarik dengan relasi user & category
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article class="group relative bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                    
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700 hover:bg-indigo-200 transition-colors">
                                <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
                                {{ $post->category->name }}
                            </span>
                            <span class="text-xs text-slate-400">•</span>
                            <span class="text-xs text-slate-500 flex items-center gap-1">
                                <x-icons.user class="w-4 h-4 text-slate-400" />
                                {{ $post->user->name }}
                            </span>
                        </div>

                        <div>
                            <h2 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h2>
                            <p class="text-xs text-slate-400 mt-1 flex items-center gap-1">
                                <x-icons.calendar class="w-3 h-3 text-slate-400" />
                                {{ $post->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <p class="text-slate-600 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt ?? \Illuminate\Support\Str::limit($post->body, 150) }}
                        </p>

                        <div class="pt-2 border-t border-slate-100">
                            <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 flex items-center gap-2 group/btn">
                                Baca selengkapnya
                                <x-icons.arrow-right class="w-4 h-4 text-indigo-600 transform group-hover/btn:translate-x-1 transition-transform" />
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


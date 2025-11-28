<x-layout>
    <x-slot:title>Tentang</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-8">
        <div class="text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Tentang Proyek Ini
            </h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Pelajari lebih lanjut tentang proyek ini dan teknologi yang digunakan
            </p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8 space-y-6">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    Tujuan Proyek
                </h2>
                <p class="text-slate-600 leading-relaxed text-lg">
                    Proyek ini dibuat untuk praktikum Pemrograman Web, menampilkan implementasi
                    MVC menggunakan Laravel 12, Blade components, dan Tailwind CSS.
                </p>
            </div>

            <div class="space-y-4 pt-6 border-t border-slate-100">
                <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </span>
                    Fitur Utama
                </h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">Relasi Model</h3>
                            <p class="text-sm text-slate-600">User, Category, dan Post dengan relasi Eloquent</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">Factory & Seeder</h3>
                            <p class="text-sm text-slate-600">Generate data dummy dengan Faker</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">Blade Components</h3>
                            <p class="text-sm text-slate-600">Component-based templating dengan slots</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900">Eager Loading</h3>
                            <p class="text-sm text-slate-600">Optimasi query dengan with() dan withCount()</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4 pt-6 border-t border-slate-100">
                <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                    <span class="w-10 h-10 rounded-lg bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </span>
                    Stack Teknologi
                </h2>
                <div class="flex flex-wrap gap-3">
                    <span class="px-4 py-2 rounded-lg bg-indigo-100 text-indigo-700 font-semibold text-sm">Laravel 12</span>
                    <span class="px-4 py-2 rounded-lg bg-purple-100 text-purple-700 font-semibold text-sm">PHP 8.4</span>
                    <span class="px-4 py-2 rounded-lg bg-pink-100 text-pink-700 font-semibold text-sm">Tailwind CSS</span>
                    <span class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold text-sm">Blade</span>
                    <span class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 font-semibold text-sm">SQLite</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>


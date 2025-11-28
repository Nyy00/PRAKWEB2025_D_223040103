<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 text-slate-900 antialiased">
    <div class="flex min-h-screen flex-col">
        <header class="bg-white/80 backdrop-blur-md shadow-lg border-b border-slate-200/50 sticky top-0 z-50">
            <nav class="container mx-auto flex items-center justify-between px-6 py-4">
                <a href="/" class="flex items-center gap-2 text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent hover:from-indigo-700 hover:to-purple-700 transition-all duration-300">
                    <x-icons.home class="w-6 h-6 text-indigo-600" />
                    <span>PrakWeb Blog</span>
                </a>
                <div class="flex items-center gap-6 text-sm font-medium">
                    <a href="/" class="px-3 py-2 rounded-lg transition-all duration-200 {{ request()->is('/') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">
                        Beranda
                    </a>
                    <a href="/posts" class="px-3 py-2 rounded-lg transition-all duration-200 {{ request()->is('posts') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">
                        Postingan
                    </a>
                    <a href="/categories" class="px-3 py-2 rounded-lg transition-all duration-200 {{ request()->is('categories') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">
                        Kategori
                    </a>
                    <a href="/about" class="px-3 py-2 rounded-lg transition-all duration-200 {{ request()->is('about') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-indigo-600' }}">
                        Tentang
                    </a>
                </div>
            </nav>
        </header>

        <main class="container mx-auto flex-1 px-6 py-10">
            {{ $slot }}
        </main>

        <footer class="bg-white/60 backdrop-blur-sm border-t border-slate-200/50 mt-auto">
            <div class="container mx-auto px-6 py-6 text-sm text-slate-500 text-center">
                <p class="flex items-center justify-center gap-2">
                    <span>&copy; {{ now()->year }} PrakWeb Blog. Dibuat dengan</span>
                    <x-icons.heart class="w-5 h-5 text-red-500" />
                    <span>menggunakan Laravel 12</span>
                </p>
            </div>
        </footer>
    </div>
</body>

</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'SocialPlatform') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
        </style>
    </head>
    <body class="antialiased bg-[#F9FAFB] text-gray-900">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 glass border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="size-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold">S</div>
                    <span class="text-xl font-extrabold tracking-tight text-gray-900">Social<span class="text-indigo-600">Platform</span></span>
                </div>
                
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition font-medium">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition font-medium">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-bold rounded-lg hover:bg-indigo-700 transition shadow-sm">Join Now</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="pt-32 pb-20 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
                <!-- Background Decorations -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -z-10 w-full h-[500px]">
                    <div class="absolute top-0 left-1/4 w-64 h-64 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
                    <div class="absolute top-20 right-1/4 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-700"></div>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-gray-900 mb-6">
                    Connect with your <br> <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">Community.</span>
                </h1>
                <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
                    A modern social platform designed for groups, friends, and creators. Share your story, join conversations, and discover new perspectives.
                </p>

                <div class="flex items-center justify-center space-x-4 mb-20">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 transform hover:-translate-y-1">
                        Get Started for Free
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-gray-700 border border-gray-200 font-bold rounded-xl hover:bg-gray-50 transition shadow-sm transform hover:-translate-y-1">
                        Sign In
                    </a>
                </div>

                <!-- App Mockup Placeholder -->
                <div class="relative max-w-5xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden aspect-video relative group">
                        <div class="w-full h-full bg-gray-50 flex items-center justify-center overflow-hidden">
                             <!-- Visual representation of the app -->
                             <div class="grid grid-cols-12 w-full h-full p-4 gap-4">
                                 <div class="col-span-3 bg-gray-100 rounded-lg animate-pulse"></div>
                                 <div class="col-span-6 space-y-4">
                                     <div class="h-32 bg-gray-200 rounded-xl animate-pulse"></div>
                                     <div class="h-64 bg-white border border-gray-100 rounded-xl shadow-sm"></div>
                                 </div>
                                 <div class="col-span-3 space-y-4">
                                     <div class="h-10 bg-indigo-50 rounded-lg animate-pulse"></div>
                                     <div class="h-48 bg-gray-100 rounded-lg animate-pulse"></div>
                                 </div>
                             </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent"></div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section class="py-20 bg-white border-y border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                    <div>
                        <div class="size-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Build Communities</h3>
                        <p class="text-gray-500 text-sm">Create or join groups based on your interests and hobbies.</p>
                    </div>
                    <div>
                        <div class="size-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Real-time Echo</h3>
                        <p class="text-gray-500 text-sm">Instant notifications and real-time messaging across all devices.</p>
                    </div>
                    <div>
                        <div class="size-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Privacy First</h3>
                        <p class="text-gray-500 text-sm">Control your data with granular privacy settings and encryption.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 bg-[#F9FAFB]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} SocialPlatform. Built with Laravel and ❤️.
            </div>
        </footer>
    </body>
</html>

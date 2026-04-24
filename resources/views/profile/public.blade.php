<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Cover Photo Area -->
                <div class="relative h-64 bg-gradient-to-r from-indigo-500 to-purple-600">
                    @if($user->cover_photo_path)
                        <img src="{{ Storage::url($user->cover_photo_path) }}" class="w-full h-full object-cover" alt="Cover Photo">
                    @endif
                    
                    <!-- Profile Photo Overlay -->
                    <div class="absolute -bottom-16 left-8">
                        <div class="p-1 bg-white rounded-full">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full size-32 object-cover border-4 border-white shadow-lg">
                        </div>
                    </div>
                </div>

                <!-- Profile Info Header -->
                <div class="pt-20 pb-8 px-8 flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-indigo-600 font-medium">@ {{ $user->username }}</p>
                        
                        @if($user->location)
                            <div class="flex items-center mt-2 text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $user->location }}
                            </div>
                        @endif
                    </div>

                    @auth
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('profile.show') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md font-semibold text-sm transition">
                                Edit Profile
                            </a>
                        @else
                            <button class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-semibold text-sm transition shadow-md">
                                Follow
                            </button>
                        @endif
                    @endauth
                </div>

                <!-- Bio Section -->
                @if($user->bio)
                    <div class="px-8 pb-8 border-b border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-2">About</h3>
                        <p class="text-gray-700 leading-relaxed max-w-2xl">
                            {{ $user->bio }}
                        </p>
                    </div>
                @endif

                <!-- Content Tabs (Placeholder for Posts) -->
                <div class="px-8 bg-gray-50/50">
                    <div class="flex space-x-8 border-b border-transparent">
                        <button class="py-4 border-b-2 border-indigo-500 text-indigo-600 font-semibold text-sm">Posts</button>
                        <button class="py-4 text-gray-500 hover:text-gray-700 font-medium text-sm">Photos</button>
                        <button class="py-4 text-gray-500 hover:text-gray-700 font-medium text-sm">Following</button>
                        <button class="py-4 text-gray-500 hover:text-gray-700 font-medium text-sm">Followers</button>
                    </div>
                </div>

                <!-- Empty State for Posts -->
                <div class="p-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4h4" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 9h10M7 13h10M7 17h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">No posts yet</h3>
                    <p class="text-gray-500 mt-1">When {{ $user->name }} shares something, it will appear here.</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

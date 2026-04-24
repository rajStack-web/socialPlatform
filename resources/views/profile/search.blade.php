<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Search Results</h2>
                @if($query)
                    <p class="text-gray-500">Showing results for "{{ $query }}"</p>
                @endif
            </div>

            <div class="space-y-4">
                @forelse($users as $user)
                    <div class="bg-white p-4 rounded-xl shadow-sm flex items-center justify-between border border-gray-100 hover:border-indigo-200 transition">
                        <div class="flex items-center">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full size-12 object-cover mr-4">
                            <div>
                                <a href="{{ route('profile.public', $user->username ?? $user->id) }}" class="font-bold text-gray-900 hover:text-indigo-600 transition">
                                    {{ $user->name }}
                                </a>
                                <p class="text-gray-500 text-sm">@ {{ $user->username ?? 'user_' . $user->id }}</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('profile.public', $user->username ?? $user->id) }}" class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-md font-semibold text-sm hover:bg-indigo-100 transition">
                            View Profile
                        </a>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No users found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try searching for a different name or username.</p>
                    </div>
                @endforelse

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

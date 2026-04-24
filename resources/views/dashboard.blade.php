<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

                <!-- Left Sidebar: Profile Summary -->
                <div class="hidden md:block md:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-8">
                        <div class="h-16 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                        <div class="px-5 pb-5">
                            <div class="relative -mt-8 mb-3">
                                <img src="{{ auth()->user()->profile_photo_url }}"
                                    class="rounded-full size-16 object-cover border-4 border-white shadow-sm">
                            </div>
                            <h3 class="font-bold text-gray-900">{{ auth()->user()->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4">@
                                {{ auth()->user()->username ?? 'user_' . auth()->id() }}</p>

                            <hr class="my-4 border-gray-100">

                            {{-- <div class="space-y-3">
                                <a href="{{ route('profile.public', auth()->user()->username ?? auth()->id()) }}"
                                    class="flex items-center text-sm text-gray-700 hover:text-indigo-600 font-medium transition">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    View Profile
                                </a> --}}
                                <a href="#"
                                    class="flex items-center text-sm text-gray-700 hover:text-indigo-600 font-medium transition">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    My Friends
                                </a>
                                <a href="#"
                                    class="flex items-center text-sm text-gray-700 hover:text-indigo-600 font-medium transition">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>
                                    Saved Posts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div>
                    <h1>Count: {{ $count }}</h1>
                    <button wire:click="increment">+</button>
                    <button wire:click="decrement">-</button>
                </div> --}}
            <livewire:counter />

            </div>
        </div>
    </div>
</x-app-layout>
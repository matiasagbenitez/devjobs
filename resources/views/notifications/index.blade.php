<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-2xl font-bold text-center mb-5">Notifications</h1>

                    <div class="divide-y divide-gray-200">
                        @forelse ($notifications as $notification)
                            <div class="p-5md:flex md:justify-between md:items-center">
                                <div>
                                    <p>You have a new candidate on
                                        <span class="font-bold">{{ $notification->data['name_vacant'] }}</span>
                                    </p>

                                    <p>
                                        <span class="text-gray-600 text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <div class="mt-5 md:mt-0">
                                    <a href="{{ route('canidates.index', $notification->data['id_vacant']) }}" class="bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg">Candidates</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">You have no notifications!</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

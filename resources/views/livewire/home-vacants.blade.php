<div>

    <livewire:filter-vacants />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-3xl text-gray-700 mb-12 text-center">Our available vacancies!</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">

                @forelse ($vacants as $vacant)
                    <div class="md:flex md:justify-between md:items-center py-3">
                        <div class="flex-1">
                            <a href="{{ route('vacants.show', $vacant->id) }}" class="text-2xl font-extrabold text-gray-600">
                                {{ $vacant->title }}
                            </a>
                            <p class="text-base text-gray-500">{{ $vacant->company }}</p>
                            <p class="text-xs text-gray-500">{{ $vacant->category->category }}</p>
                            <p class="text-xs text-gray-500">{{ $vacant->salary->salary }}</p>
                            <p class="text-xs text-gray-500 mb-3">{{ $vacant->last_day->format('d-m-Y') }}</p>
                        </div>
                        <div class="mt-3 md:mt-0">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="bg-indigo-600 p-3 text-xs uppercase font-bold text-white rounded-lg block text-center">
                                More info
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No vacancies yet!</p>
                @endforelse

            </div>

        </div>
    </div>
</div>

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacants as $vacant)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-1">
                <a href="#" class="text-base font-bold">{{ $vacant->title }}</a>
                <p class="text-base">{{ $vacant->company }}</p>
                <p class="text-sm text-gray-500">Last day to apply: {{ $vacant->last_day->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row text-center gap-3 md:items-center mt-5 md:mt-0">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Candidates</a>
                <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Edit</a>
                <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Delete</a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No vacants!</p>
    @endforelse ($vacants as $vacant)

</div>

<div class="mt-5">
    {{ $vacants->links() }}
</div>


<div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacants as $vacant)
    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
        <div class="space-y-1">
            <a href="{{ route('vacants.show', $vacant) }}" class="text-base font-bold">{{ $vacant->title }}</a>
            <p class="text-base">{{ $vacant->company }}</p>
                <p class="text-sm text-gray-500">Last day to apply: {{ $vacant->last_day->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row text-center gap-3 md:items-center mt-5 md:mt-0">
                <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Candidates</a>
                <a href="{{ route('vacants.edit', $vacant->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Edit</a>
                <button wire:click="$emit('showAlert', {{ $vacant->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Delete</button>
            </div>
        </div>
        @empty
        <p class="p-3 text-center text-sm text-gray-600">No vacants!</p>
        @endforelse ($vacants as $vacant)

    </div>

    <div class="mt-5">
        {{ $vacants->links() }}
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('showAlert', vacantId => {
            Swal.fire({
                title: 'Delete vacant?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante
                Livewire.emit('deleteVacant', vacantId);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success',
                )
            }
            });
        });

    </script>
@endpush

<div class="bg-gray-100 p-5 mt-5 flex flex-col justify-center items-center">

    <h3 class="text-center text-xl font-bold my-4">Apply for this job</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm rounded-lg">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent='apply' class="w-96 mt-3">
            <div class="mb-4 text-center">
                <x-label for="cv" :value="__('Curriculum Vitae (PDF)')" />
                <x-input id="cv" type="file" accept=".pdf" wire:model="cv" class="block mt-1 w-full" />

                @error('cv')
                    <livewire:show-alert :message="$message" />
                @enderror

                <x-button class="my-5">
                    {{ __('Apply') }}
                </x-button>
            </div>
        </form>
    @endif

</div>

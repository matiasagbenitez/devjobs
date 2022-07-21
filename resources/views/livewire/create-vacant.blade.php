<form class="md:w-1/2 space-y-3" wire:submit.prevent='createVacant'>

    {{-- Title --}}
    <div>
        <x-label for="title" :value="__('Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" />
        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Salary --}}
    <div>
        <x-label for="salary" :value="__('Monthly salary')" />
        <select wire:model="salary" id="salary" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="">Choose one...</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <x-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option value="">Choose one...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Company --}}
    <div>
        <x-label for="company" :value="__('Company')" />
        <x-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" />
        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Last day --}}
    <div>
        <x-label for="last_day" :value="__('Last day')" />
        <x-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <x-label for="description" :value="__('Description')" />
        <textarea wire:model="description" id="description" cols="30" rows="10" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"></textarea>
        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Image --}}
    <div>
        <x-label for="image" :value="__('Image')" />
        <x-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*" />

        <div class="my-5 w-80">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Image preview">
            @endif
        </div>

        @error('image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    {{-- Button --}}
    <x-button class="w-full justify-center">
        Create vacant
    </x-button>

</form>

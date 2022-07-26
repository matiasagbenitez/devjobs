<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-2xl text-gray-800 my-3">
            {{ $vacant->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-3">
            <p class="font-bold text-sm uppercase text-gray-800 my-2">
                Company: <span class="normal-case font-normal">{{ $vacant->company }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-2">
                Last day to apply: <span class="normal-case font-normal">{{ $vacant->last_day->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-2">
                Category: <span class="normal-case font-normal">{{ $vacant->category->category }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-2">
                SAlary: <span class="normal-case font-normal">{{ $vacant->salary->salary }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacants/'.$vacant->image) }}" alt="Vacant image">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-xl font-bold mb-3">Job description</h2>
            <p>{{ $vacant->description }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                Do you want to apply to this vacancy?
                <a class="font-bold text-indigo-600" href="{{ route('register') }}">Get an account and apply for this and other vacancies</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacant::class)
       <livewire:apply-vacant :vacant="$vacant" />
    @endcannot
</div>

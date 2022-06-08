<div class="flex justify-center">
    <x-card class="w-10/12">
        <form action="/dashboard">
            <label class="sr-only" for="search">Search</label>
            <input
                type="text"
                name="search"
                class="w-full rounded-lg border-2 border-gray-200 p-3"
                placeholder="Search"
                value="{{ request('search') }}"
            />
            <div class="">
                <button
                    type="submit"
                    class="mt-4 px-4 py-1 text-white rounded-full font-semibold bg-red-600 text-white hover:text-rose-900 border-2 "
                >
                    Search
                </button>
            </div>
    </x-card>
    </form>

</div>

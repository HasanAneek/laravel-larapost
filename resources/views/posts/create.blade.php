<x-layout>

    <article class="flex justify-center">
        <x-card class="w-6/12">

            <form method="POST" action="/posts">
                @csrf

                <div class="mb-4">
                    <label for="title" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" class="mt-2 w-full border-2 p-4 bg-gray-100 rounded-lg @error('title') border-red-500 @enderror">

                    @error('title')
                    <span class="text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="sr-only">Description</label>
                    <textarea name="description" id="" cols="20" rows="4" placeholder="Write Something!" class="bg-gray-100 rounded-lg p-4 w-full mt-2 border-2 @error('description') border-red-500 @enderror"></textarea>

                    @error('description')
                    <span class="text-red-500 mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="p-3 text-white mt-2 w-full bg-blue-500 rounded-2xl hover:bg-blue-700 w-3/12">Post</button>
                </div>
            </form>
        </x-card>
    </article>

</x-layout>

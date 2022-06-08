<x-layout>
    <x-card class="justify-center bg-white p-4 rounded-lg items-center">
        <div class="border-2 bg-gray-100 p-3 w-full rounded-lg ">
            <div class="flex justify-center">
                <h1 class="font-bold px-2">{{ $post->user->name }}</h1> <span class="text-gray-600 text-sm ">{{ $post->created_at->diffForHumans() }}</span>
            </div>

            <h1 class="mt-2 font-semibold">Title: {{ $post->title }}</h1>
            <p class="mt-2"><span class="font-semibold">Description:</span>  {{ $post->description }}</p>
            <!--Edit Form -->
            <div class="flex justify-center mt-6">
                <div class="mr-2">
                    @if ($post->ownBy(auth()->user()))
                        <a href="/posts/{{ $post->id }}/edit">
                            <button class="px-4 py-1 text-white rounded-full border border-blue-500 font-semibold bg-green-600 text-white hover:text-green-900 ">Edit</button>
                        </a>
                    @endif
                </div>
                <!--Delete Button-->
                @if ($post->ownBy(auth()->user()))
                    <form action="/posts/{{ $post->id }}" method="POST" class="mr-2">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-1 text-white rounded-full border border-red-500 font-semibold bg-rose-600  text-white hover:text-green-900">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </x-card>
</x-layout>



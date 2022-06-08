@props(['post'])

<x-card>
    <div class="flex items-center">
        <div class="border-2 bg-gray-100 p-3 w-full ">
            <div class="flex justify-end mb-2">
                <a href="/posts/{{ $post->id }}" class="font-bold text-left mr-2">{{ $post->user->name }}</a><span class="text-gray-600 text-sm mr-2">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="text-2xl">
                <a class="font-semibold" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h3>
            <p class="mt-3 text-center">{{ $post->description }}</p>

            <!--Like & Unlike Button -->
            <div class="flex justify-center mt-6">
                @auth
                    @if (! $post->likedBy(auth()->user()))
                        <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
                            @csrf
                            <button class="border border-blue-500 px-4 py-1 rounded-full text-white font-semibold bg-blue-400 text-white hover:text-blue-700 ">Like</button>
                        </form>
                    @else
                        <form action="/posts/{{ $post->id }}/likes" method="POST" class="mr-2">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-1 rounded-full border border-blue-500 font-semibold bg-blue-400 text-white hover:text-blue-700">Unlike</button>
                        </form>
                    @endif
                @endauth
                <span>{{ $post->likes->count() }} {{ \Illuminate\Support\Str::plural('like',$post->likes->count()) }} </span>

            </div>
        </div>
    </div>
</x-card>

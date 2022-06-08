<x-layout>
    @include('partials._search')

    <div class="flex justify-center ">
        <x-card class="w-10/12">
            @unless ($posts->count() == 0)
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            @else
                <p>No posts found!</p>
            @endunless
            <div class="mt-6 p-4">
                {{ $posts->links() }}
            </div>
        </x-card>
    </div>
</x-layout>

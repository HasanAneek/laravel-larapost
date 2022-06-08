<x-layout>
    <x-card class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg  ">
            <form action="/users" method="POST" class="mt-4 ">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text"
                           name="name"
                           placeholder="Name"
                           class=" w-full border-2 w-full bg-gray-100 p-4 rounded-lg @error('name') border-red-500 @enderror"
                           value="{{ old('name') }}">

                    @error('name')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email"
                           name="email"
                           placeholder="Email"
                           class=" w-full border-2 bg-gray-100 p-4 rounded-lg @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}"/>

                    @error('email')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password"
                           name="password"
                           placeholder="Enter your password"
                           class=" w-full border-2 bg-gray-100 p-4 rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input type="password"
                           name="password_confirmation"
                           placeholder="Repeat Password"
                           class=" w-full border-2 bg-gray-100 p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">

                    @error('password_confirmation')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
                <div class="mt-8">
                    <p>
                        Already have an account?
                        <a href="/login" class="font-semibold hover:text-blue-500">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </x-card>
</x-layout>

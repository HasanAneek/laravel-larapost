<x-layout>
    <x-card class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg  ">
            <form action="/users/authenticate" method="POST" class="mt-4 ">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email"
                           name="email"
                           placeholder="Email"
                           class=" w-full border-2 bg-gray-100 p-4 rounded-lg @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}">

                    @error('email')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password"
                           name="password"
                           placeholder="Enter your password"
                           class=" w-full border-2 bg-gray-100 p-4 rounded-lg @error('password') border-red-500 @enderror"/>

                    @error('password')
                    <span class="text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4 mt-3">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" >Remember Me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>

                <div class="mt-8">
                    <p>
                        Dont have an account?
                        <a href="/register" class="font-semibold hover:text-blue-500">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </x-card>
</x-layout>

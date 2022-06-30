<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lara-posts</title>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
<nav class="flex justify-between bg-white p-6 mb-6 ">
    <ul class="flex">
        <li>
            <a href="/" class="p-4">Home</a>
        </li>
        <li>
            <a href="/dashboard" class="p-4">Dashboard</a>
        </li>
        <li>
            <a href="/posts/create" class="p-4">Posts</a>
        </li>
    </ul>

    <ul class="flex">
        @auth
            <li>
                <span class="font-bold">welcome, {{ auth()->user()->name }}</span>
            </li>
            <li>
                <form action="/logout" method="POST" class="px-3">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-red-500 rounded-lg text-white hover:bg-red-700">Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="/register" class="p-4">
                    <button class="px-3 py-1 bg-blue-500 rounded-lg text-white hover:bg-blue-700">Register</button>
                </a>
            </li>
            <li>
                <a href="/login" class="p-4">
                    <button class="px-3 py-1 bg-green-500 rounded-lg text-white hover:bg-green-700">Login</button>
                </a>
            </li>
        @endauth
    </ul>
</nav>

<main>
    {{ $slot }}
</main>

<footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
</footer>

@include('sweetalert::alert')
{{--<x-flash/>--}}
</body>
</html>

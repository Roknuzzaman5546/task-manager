<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-white min-h-screen flex items-center justify-center">

    <div class="max-w-6xl w-full p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Admin Panel -->
        <div class="bg-white flex flex-col justify-center items-center dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 h-96 text-center">
            <h2 class="text-2xl font-bold mb-10">Admin Portal</h2>
            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ url('/dashboard') }}"
                    class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded mb-2">
                    Go to Admin Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white py-2 rounded mb-2">
                    Admin Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 rounded">
                        Admin Register
                    </a>
                @endif
            @endif
        </div>

        <!-- Client Panel -->
        <div class="bg-white flex flex-col justify-center items-center dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 h-96 text-center">
            <h2 class="text-2xl font-bold mb-10">Client Portal</h2>
            @if (Auth::guard('client')->check())
                <a href="{{ route('client.dashboard') }}"
                    class="block w-full text-center bg-green-600 hover:bg-green-700 text-white py-2 rounded mb-2">
                    Go to Client Dashboard
                </a>
            @else
                <a href="{{ route('client.login') }}"
                    class="block w-full text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded mb-2">
                    Client Login
                </a>
                <a href="{{ route('client.register') }}"
                    class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 rounded">
                    Client Register
                </a>
            @endif
        </div>
    </div>
</body>
</html>

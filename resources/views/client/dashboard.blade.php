<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Assigned Tasks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen py-10">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Your Assigned Tasks</h2>

        @if (isset($tasks))
            @foreach($tasks as $task)
                <div class="border rounded-lg p-5 mb-5 bg-gray-50">
                    <h4 class="text-lg font-semibold text-blue-600">{{ $task->title }}</h4>
                    <p class="text-gray-700 mt-1">{{ $task->description }}</p>

                    <div class="flex justify-between items-center mt-3 text-sm text-gray-600">
                        <p><span class="font-medium">Due:</span> {{ $task->due_date }}</p>
                        <p><span class="font-medium">Priority:</span>
                            <span class="px-2 py-1 rounded-full 
                                    {{ 
                                        $task->priority === 'high' ? 'bg-red-200 text-red-800' :
                    ($task->priority === 'medium' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800')
                                    }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </p>
                    </div>

                    <div class="mt-4">
                        @if (!$task->is_complete)
                            <form method="POST" action="{{ route('client.tasks.complete', $task->id) }}">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition">
                                    Mark Complete
                                </button>
                            </form>
                        @else
                            <span class="inline-block mt-2 px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
                                Completed
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach
            <div>
                <h2 class=" text-xl font-bold text-center text-red-500">No task for you</h2>
            </div>
        @endif

        {{-- Logout --}}
        <form method="POST" action="{{ route('client.logout') }}" class="mt-52 text-center">
            @csrf
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                Logout
            </button>
        </form>
    </div>

</body>

</html>
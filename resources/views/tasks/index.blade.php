@vite('resources/css/app.css')
<div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Task List</h2>
        <a href="{{ route('tasks.create') }}"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Create Task
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($tasks as $task)
            <div class="bg-white rounded-xl shadow-md p-6 space-y-4 border hover:shadow-lg transition">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $task->title }}</h3>
                    <p class="text-sm text-gray-500">Client: {{ $task->client->name }}</p>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('tasks.edit', $task->id) }}">
                       <button  class="inline-block bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                           Edit
                       </button>
                    </a>

                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this task?')"
                                class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

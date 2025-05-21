@vite('resources/css/app.css')
<form method="POST" action="{{ route('tasks.store') }}" class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    @csrf
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create New Task</h2>

    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter task title"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" placeholder="Write task description"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4" required></textarea>
    </div>

    <div class="mb-4">
        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
        <input type="date" id="due_date" name="due_date"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
        <select id="priority" name="priority"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>

    <div class="mb-6">
        <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Assign to Client</label>
        <select id="client_id" name="client_id"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-between">
        <a href="{{ url()->previous() }}"
           class="inline-block bg-gray-200 text-gray-800 px-5 py-2 rounded-md hover:bg-gray-300 transition duration-300">
            ← Back
        </a>

        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
            Create Task
        </button>
    </div>
</form>
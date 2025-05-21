@vite('resources/css/app.css')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Task</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Description</label>
            <textarea name="description"
                class="w-full border rounded px-3 py-2">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Due Date</label>
            <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Priority</label>
            <select name="priority" class="w-full border rounded px-3 py-2">
                <option value="low" {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>Medium
                </option>
                <option value="high" {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Assign To Client</label>
            <select name="client_id" class="w-full border rounded px-3 py-2">
                <option value="">-- None --</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $task->client_id) == $client->id ? 'selected' : '' }}>
                        {{ $client->name }} ({{ $client->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ url()->previous() }}"
                class="inline-block bg-gray-200 text-gray-800 px-5 py-2 rounded-md hover:bg-gray-300 transition duration-300">
                ← Back
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Task
            </button>
        </div>
    </form>
</div>
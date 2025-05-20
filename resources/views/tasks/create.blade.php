<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title" required />
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="date" name="due_date" required />
    <select name="priority">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
    </select>
    <select name="client_id">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
    <button>Create Task</button>
</form>

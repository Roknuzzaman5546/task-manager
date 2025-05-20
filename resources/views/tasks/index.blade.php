<a href="{{ route('tasks.create') }}">Create Task</a>
@foreach($tasks as $task)
    <div>
        <h3>{{ $task->title }}</h3>
        <p>Client: {{ $task->client->name }}</p>
        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
            @csrf @method('DELETE')
            <button>Delete</button>
        </form>
    </div>
@endforeach

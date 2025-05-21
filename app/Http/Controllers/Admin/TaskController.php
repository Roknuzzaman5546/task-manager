<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('client')->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $clients = \App\Models\Client::all();
        return view('tasks.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'priority' => 'required|in:low,medium,high',
            'client_id' => 'required|exists:clients,id',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'client_id' => $request->client_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $clients = \App\Models\Client::all();
        return view('tasks.edit', compact('task', 'clients'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        return view('tasks.partials.form');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create($request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    // Show edit form
    public function edit(Task $task)
    {
        return view('tasks.partials.form', compact('task'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }

    public function toggle(Task $task)
    {
        $task->is_done = !$task->is_done;
        $task->save();

        return redirect()->route('tasks.index');
    }

}

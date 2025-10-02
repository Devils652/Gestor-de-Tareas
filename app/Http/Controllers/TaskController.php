<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        Task::create($validated);
        
        return redirect()->route('tasks.index')
            ->with('success', '¡Tarea creada exitosamente!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);
        
        $validated['is_completed'] = $request->has('is_completed');
        $task->update($validated);
        
        return redirect()->route('tasks.index')
            ->with('success', '¡Tarea actualizada exitosamente!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('tasks.index')
            ->with('success', '¡Tarea eliminada exitosamente!');
    }
}
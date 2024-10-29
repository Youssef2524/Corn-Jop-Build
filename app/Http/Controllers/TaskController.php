<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\updateTaskRequest;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->middleware('auth');

        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(updateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $this->taskService->updateTask($task, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

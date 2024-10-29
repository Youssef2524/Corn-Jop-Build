<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        return $task->update($data);
    }
}

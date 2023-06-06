<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        $tasks = Task::with('project')->orderBy('priority', 'ASC')->paginate(request()->total);

        return response(["tasks" => $tasks, "status" => 200], 200);
    }

    public function filterTasks(Request $request)
    {

        $query = $request->input('query');

        $tasks = Task::with('project')->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('project_id', '=', $query);
        })->paginate(request()->total);

        return response(["tasks" => $tasks]);
    }

    public function createTask(Request $request)
    {

        $tasks = Task::orderBy('priority', 'DESC')->get();

        $largestid = 1;

        $tasks = Task::get();

        $ids = $tasks->pluck("id");

        if ($tasks) {
            Task::create([
                'name' => $request->name,
                'priority' => $largestid++,
                'project_id' => $request->project_id
            ]);
        }

        $new_tasks = Task::whereNotIn('id', $ids)->get();

        for ($i = count($tasks); $i <  count($new_tasks) + count($tasks); $i++) {
            $new_tasks[$i - count($tasks)]->update([
                "priority" => $i + 1
            ]);
        }

        return response(["tasks" => $tasks, "status" => 201, "message" => "Task saved"], 201);
    }

    public function updateTask(Request $request, $id)
    {

        $task = Task::where('id', $id)->first();
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->save();

        $tasks = Task::get();

        return response(["tasks" => $tasks, "status" => 200], 200);
    }

    public function updateTasksOrder(Request $request)
    {

        $newTask = $request->newTask;
        $oldTask = $request->oldTask;

        $newTaskData = Task::where('priority', $newTask['priority'])->first();
        $oldTaskData = Task::where('priority', $oldTask['priority'])->first();

        $newTaskData->priority = $oldTask['priority'];
        $newTaskData->save();

        $oldTaskData->priority = $newTask['priority'];
        $oldTaskData->save();

        $tasks = Task::orderBy('priority', 'DESC')->get();

        return response(["message" => "Tasks Reordered", "tasks" => $tasks, "status" => 200], 200);
    }

    public function deleteTask(Request $request, $id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();

        $tasks = Task::get();

        return response(["tasks" => $tasks, "status" => 200], 200);
    }
}

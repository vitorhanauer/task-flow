<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::getUser()->id);
        $tasks = $user->tasks()->where('status','0')->get();
        $tasksCompleted = $user->tasks()->where('status','1')->get();
        return view('task.index')
                ->with('tasks',$tasks)
                ->with('tasksCompleted',$tasksCompleted);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskFormRequest $request)
    {
        $attributes= array_merge($request->only(['title','description']), ['status' => '0', 'users_id' => Auth::getUser()->id]);
        Task::create($attributes);
        return to_route('task.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('task.index');
    }

    public function edit(Task $task)
    {
        return view('task.edit')->with('task',$task);
    }

    public function update(TaskFormRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();
        return to_route('task.index');
    }

    public function complete(Task $task)
    {
        $task->status = !$task->status;
        $task->save();
        return to_route('task.index');
    }

}

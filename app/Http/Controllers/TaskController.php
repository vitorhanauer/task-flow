<?php

namespace App\Http\Controllers;

use App\Events\TaskCreated;
use App\Http\Requests\TaskFormRequest;
use App\Mail\CreatedTask;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Task\TaskRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{

    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
        
    }

    public function index()
    {
        $user = User::find(Auth::getUser()->id);
        $tasks = $this->taskRepository->allTasks($user);
        $tasksCompleted = $this->taskRepository->allTasksCompleted($user);        
        return view('task.index')
                ->with('tasks',$tasks)
                ->with('tasksCompleted',$tasksCompleted)
                ->with('user',$user);
    }

    public function create()
    {
        $user = User::find(Auth::getUser()->id);
        return view('task.create')->with('user',$user);
    }

    public function store(TaskFormRequest $request)
    {
        try{
            $user = User::find(Auth::getUser()->id);
            $this->taskRepository->save($request->all(), $user);
            event(new TaskCreated($user));
            return to_route('task.index');
        }catch(Exception $e){
            dd($e->getMessage());
            return to_route('task.index');
        }
    }

    public function destroy(Task $task)
    {
        $this->taskRepository->destroy($task);
        return to_route('task.index');
    }

    public function edit(Task $task)
    {
        $user = User::find(Auth::getUser()->id);
        return view('task.edit')->with('task',$task)->with('user',$user);
    }

    public function update(TaskFormRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();
        return to_route('task.index');
    }

    public function complete(Task $task)
    {
        $this->taskRepository->complete($task);
        return to_route('task.index');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Group\GroupRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    private $user;

    public function __construct(
        private GroupRepositoryInterface $groupRepositoryInterface,
        private TaskRepositoryInterface $taskRepository
        )
    {
        $this->user = Auth::user();
    }

    public function index()
    {
        return view('group.index')->with('user',$this->user);
    }

    public function create()
    {
        return view('group.create')->with('user',$this->user);
    }

    public function store(Request $request)
    {
        try{
            $this->groupRepositoryInterface->save($request->all(), $this->user->id);
            return to_route("task.index");
        }catch(Exception $e){
            return to_route("group.create")->withErrors(['Erro ao criar grupo']);
        }
    }

    public function show(Group $group)
    {
        $tasks = $this->groupRepositoryInterface->allTasks($group);
        $tasksCompleted = $this->groupRepositoryInterface->allTasksCompleted($group);   
        return view('group.show')
            ->with('user',$this->user)
            ->with('tasks',$tasks)
            ->with('group',$group)
            ->with('tasksCompleted',$tasksCompleted);
    }

    public function destroy(Task $task)
    {
        $this->taskRepository->destroy($task);
        return to_route('group.show',$task->group_id);
    }

    public function edit(Task $task)
    {
        $user = User::find(Auth::getUser()->id);
        return view('group.edit')->with('task',$task)->with('user',$user);
    }

    public function update(TaskFormRequest $request, Task $task)
    {
        $task->fill($request->all());
        $task->save();
        return to_route('group.show',$task->group_id);
    }

    public function complete(Task $task)
    {
        $this->taskRepository->complete($task);
        return to_route('group.show',$task->group_id);
    }

}

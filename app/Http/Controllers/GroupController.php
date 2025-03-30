<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GroupInviteMiddleware;
use App\Http\Requests\TaskFormRequest;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Group\GroupRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller implements HasMiddleware
{
    private $user;

    public function __construct(
        private GroupRepositoryInterface $groupRepositoryInterface,
        private TaskRepositoryInterface $taskRepository,
        private UserRepositoryInterface $userRepository
        )
    {
        $this->user = Auth::user();
    }

    public static function middleware()
    {
        return [
            new Middleware(GroupInviteMiddleware::class, only: ['show','search'])
        ];
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
            return to_route("group.index");
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

    public function search(Request $request,Group $group)
    {
        $name = $request['name'];
        $users = $name === null ? $this->userRepository->all() : $this->userRepository->findByName($name);
        $users = $users->filter(function($user) use ($group){
            foreach($user->groups as $gp){
                if($gp->id == $group->id) return false;
            }
            return $user;
        })->values();
        return view('group.search')
            ->with('user',$this->user)
            ->with('users',$users)
            ->with('group',$group);
    }

    public function addUser(User $user, Group $group)
    {
        $this->groupRepositoryInterface->insertUserOnGroup($group,$user);
        return to_route("group.show",$group);
    }

}

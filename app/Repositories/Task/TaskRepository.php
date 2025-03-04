<?php

namespace App\Repositories\Task;

use App\Models\Group;
use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface{

    public function __construct(private Task $task)
    {
        
    }


    public function save(array $attributes, User $user): Task
    {
        $attributes = array_merge($attributes,['status' => '0', 'users_id' => $user->id]);
        $this->task->fill($attributes);
        $this->task->save();
        return $this->task;
    }

    public function allTasks(User $user): array 
    {
        $tasks = $this->task->where('users_id',$user->id)->get();
        $taskUncompleted = [];
        foreach($tasks as $task){
            if($task->status == 0 && $task->group_id == null) $taskUncompleted[] = $task;
        }
        return $taskUncompleted;
    }

    public function allTasksCompleted(User $user): array 
    {
        $tasks = $this->task->where('users_id',$user->id)->get();
        $taskCompleted = [];
        foreach($tasks as $task){
            if($task->status == 1 && $task->group_id == null) $taskCompleted[] = $task;
        }
        return $taskCompleted;
    }


    public function destroy(Task $task)
    {
        $task->delete();
    }

    public function complete(Task $task)
    {
        $task->status = !$task->status;
        $task->save();
    }

}
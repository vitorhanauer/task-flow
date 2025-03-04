<?php

namespace App\Repositories\Group;

use App\Models\Group;
use App\Models\GroupUser;
use Exception;
use Illuminate\Support\Facades\DB;

class GroupRepository implements GroupRepositoryInterface
{
    public function save(array $attributes, int $idUser): Group
    {
        DB::beginTransaction();
        try{
            $group = Group::create($attributes);
            $groupUser = new GroupUser();
            $groupUser->group_id = $group->id;
            $groupUser->user_id = $idUser;
            $groupUser->save();
            DB::commit();
            return  $group;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception("Erro ao criar grupo");
        }
    }

    public function delete(Group $group): bool
    {
        DB::beginTransaction();
        try{
            $group->delete();
            DB::commit();
            return true;
        }catch(Exception $e){
            DB::rollBack();
           throw new Exception("Erro ao deletar grupo");
        }
    }

    public function allTasks(Group $group): array
    {
        $tasks = $group->tasks;
        $tasksUncompleted = [];
        foreach($tasks as $task){
            if($task->status == 0) $tasksUncompleted[] = $task;
        }
        return $tasksUncompleted;
    }

    public function allTasksCompleted(Group $group): array
    {
        $tasks = $group->tasks;
        $tasksCompleted = [];
        foreach($tasks as $task){
            if($task->status == 1) $tasksCompleted[] = $task;
        }
        return $tasksCompleted;
    }

}
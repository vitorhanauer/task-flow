<?php

namespace App\Repositories\Task;

use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function save(array $attributes, User $user): Task;
    public function allTasks(User $user): array;
    public function allTasksCompleted(User $user): array;
    public function destroy(Task $task);
    public function complete(Task $task);
}
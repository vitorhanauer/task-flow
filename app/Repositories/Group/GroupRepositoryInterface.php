<?php

namespace App\Repositories\Group;

use App\Models\Group;

interface GroupRepositoryInterface
{
    public function save(array $attributes, int $idUser): Group;
    public function delete(Group $group): bool;
    public function allTasks(Group $group): array;
    public function allTasksCompleted(Group $group): array;
}
<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Http\UploadedFile;

interface UserRepositoryInterface
{
    public function save(array $attributes, ?int $id = null, ?UploadedFile $imagePath = null): User;
    public function all();
    public function findByName(string $name);
}
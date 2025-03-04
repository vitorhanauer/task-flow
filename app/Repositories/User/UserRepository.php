<?php

namespace App\Repositories\User;

use App\Models\User;
use Exception;

use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserRepositoryInterface
{

    public function save(array $attributes, ?int $id = null, ?UploadedFile $image = null): User
    {
        if($id === null){
            return $this->insert($attributes);
        }
        return $this->update($attributes, $id, $image);
    }

    private function insert(array $attributes): User
    {
        DB::beginTransaction();
        try{
            $user = User::create($attributes); 
            DB::commit();
            return $user;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception("Erro ao criar usuário");
        }catch(UniqueConstraintViolationException $e){
            DB::rollBack();
            throw new Exception("Email já cadastrado");
        }
    }

    private function update(array $attributes, ?int $id, ?UploadedFile $image)
    {
        DB::beginTransaction();
        try{
            $user = User::find($id);
            isset($image) ? $user->image_path = $image->store('images','public') : "";
            $attributes['password'] ?? $user->password = Hash::make($attributes['password']);
            $user->email = $attributes['email'];
            $user->name = $attributes['name'];
            $user->save();
            DB::commit();
            return $user;
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception("Erro ao atualizar usuário");
        }
    }
}
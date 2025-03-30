<?php

namespace App\Repositories\User;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

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
            $user = new User();
            $user->fill($attributes);
            $token_email = Password::createToken($user);
            $user->token_email = $token_email;
            $user->save();
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
            if(isset($image)){
                $imagePath = $image->store('images','public');
                Storage::disk('public')->delete($user->image_path??"");
                $user->image_path = $imagePath;
            }
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

    public function all()
    {
        return User::all();
    }

    public function findByName(string $name)
    {
        $user = User::where("name",'like',"%$name%")->get();
        return $user;
    }

}
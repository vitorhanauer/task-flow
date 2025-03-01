<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginCreateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('user.edit')->with('user',Auth::user());
    }

    public function update(LoginCreateRequest $request)
    {
        try{
            $user = User::find(Auth::user()->id);
            $imagePath = $request->file('image');
            $imagePath ? $user->image_path = $imagePath->store('images','public') : '';
            $user->fill($request->only(['name','email','password']));
            $user->save();
            return to_route('user.edit');
        }catch(Exception $e){
            dd($e->getMessage());
            return to_route('user.edit')->withErrors('Erro ao atualizar usuário');
        }
    }


}

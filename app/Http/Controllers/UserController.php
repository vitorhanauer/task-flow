<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginCreateRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct(private UserRepositoryInterface $userRepositoryInterface)
    {
        
    }

    public function edit()
    {
        return view('user.edit')->with('user',Auth::user());
    }

    public function update(LoginCreateRequest $request)
    {
        try{
            $image = $request->file('image');
            $this->userRepositoryInterface->save($request->all(), Auth::user()->id, $image);
            return to_route('user.edit');
        }catch(Exception $e){
            return to_route('user.edit')->withErrors($e->getMessage());
        }
    }
}

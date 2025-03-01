<?php

namespace App\Http\Controllers;

use App\Http\Middleware\GuestMiddleware;
use App\Http\Requests\LoginCreateRequest;
use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware(GuestMiddleware::class, except : ['logout'])
        ];
    }

    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email','password']))){
            return redirect()->back()->withErrors(['Email ou senha inválidos']);
        }
        
        return to_route('task.index');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function store(LoginCreateRequest $request)
    {
        try{
            User::create($request->all());
            return to_route('login');
        }catch(UniqueConstraintViolationException $e){
            return to_route('admin.register')->withErrors('Email já cadastrado');
        }
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}

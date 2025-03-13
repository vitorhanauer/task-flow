<?php

namespace App\Http\Controllers;

use App\Events\VerifyEmail;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Requests\LoginCreateRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller implements HasMiddleware
{

    public function __construct(private UserRepositoryInterface $userRepositoryInterface)
    {
        
    }

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
            $user = $this->userRepositoryInterface->save($request->all());
            event(new VerifyEmail($user));
            return to_route('login')->withErrors(['Verifique seu email para confirmar a criação de sua conta']);
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

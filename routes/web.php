<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});


Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('login');
    Route::post('admin/login', 'login')->name('admin.login');
    Route::get('admin/registrar', 'register')->name('admin.register');
    Route::post('admin/store', 'store')->name('admin.store');
    Route::get('admin/logout', 'logout')->name('admin.logout');
});



Route::middleware(LoginMiddleware::class)->group(function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('tarefas', 'index')->name('task.index');
        Route::get('tarefas/criar', 'create')->name('task.create');
        Route::post('tarefas/salvar', 'store')->name('task.store');
        Route::delete('tarefas/{task}/deletar', 'destroy')->name('task.destroy');
        Route::get('tarefas/{task}/editar', 'edit')->name('task.edit');
        Route::put('tarefas/{task}/atualizar', 'update')->name('task.update');
        Route::get('tarefas/{task}/completar','complete')->name('task.complete');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('perfil/editar','edit')->name('user.edit');
        Route::put('perfil/atualizar','update')->name('user.update');
    });

    Route::controller(GroupController::class)->group(function (){
        Route::get('grupo/criar','create')->name('group.create');
        Route::post('grupo/salvar','store')->name('group.store');
        Route::get('grupo/visualizar','index')->name('group.index');
        Route::get('grupo/{group}/visualizar','show')->name('group.show');
        Route::get('grupo/{task}/completar','complete')->name('group.complete');
        Route::delete('grupo/{task}/deletar', 'destroy')->name('group.destroy');
        Route::get('grupo/{task}/editar', 'edit')->name('group.edit');
        Route::put('grupo/{task}/atualizar', 'update')->name('group.update');
    });

});

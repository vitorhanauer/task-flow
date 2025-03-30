@extends('components.layout')

@section('content')
    <section class="container d-flex gap-3">
        <div class="flex-fill col-6">
            <h2>Grupo : {{ $group->name }}</h2>
            <div class="d-flex flex-column my-3">
                <h3>Tarefas</h3>
                <ul class="list-group">
                    @forelse($tasks as $task)
                    <li class="list-group-item d-flex justify-content-between">
                        <span style="font-size: 16px;">{{$task->title }}</span>
                        <div class="d-flex gap-2">
                            <abbr title="Concluir Tarefa">
                                <a href="{{ route('group.complete',$task->id)}}"><i class="btn bi bi-check-circle-fill btn-sm"></i></a>
                            </abbr>
                            <abbr title="Editar Tarefa">
                                <a href="{{ route('group.edit',$task->id) }}" class="btn btn-sm"><i class="bi bi-pencil-square" style="color:white !important;"></i></a>
                            </abbr>
                            <form action="{{ route('group.destroy',$task->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <abbr title="Deletar Tarefa">
                                    <button class="btn btn-sm"><i style="color:white !important;" class="bi bi-trash3-fill"></i></button>
                                </abbr>
                            </form>
                        </div>
                    </li>
                    @empty
                    <div class="alert alert-info text-center">Este grupo não possui tarefas cadastradas</div>
                    @endforelse
                </ul>
            </div>
            <hr/>
            <div class="d-flex flex-column my-3">
                <h3>Tarefas concluidas</h3>
                <ul class="list-group">
                    @forelse($tasksCompleted as $task)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $task->title }}</span>
                            <div>
                                <abbr title="Remover Tarefa Concluida">
                                    <a class="btn btn-sm" href="{{ route('group.complete',$task->id) }}"><i class="bi bi-x-circle" style="color: white !important;"></i></a>
                                </abbr>
                            </div>
        
                        </li>
                    @empty
                        <div class="alert alert-info text-center">Este grupo ainda não completou nenhuma tarefa</div>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="flex-fill col-6">
            <div class="d-flex justify-content-between">
                <h3>Membros do Grupo</h3>
                <abbr title="Adicionar Pessoas">
                    <a href="{{ route('group.search',$group->id) }}" class="btn btn-sm"><i class="bi bi-person-fill-add" style='color:white !important'></i></a>
                </abbr>
            </div>
            <section class="alert alert-dark" style="height: 350px;">
                <ul class="list-group">
                    @foreach ($group->users()->get() as $userAll)
                        <li class="list-group-item">{{ ucwords($userAll->name)}}</li>
                    @endforeach
                </ul>
            </section>
        </div>
    </section>
@endsection
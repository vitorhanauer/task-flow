<x-layout>
    <div class="container">
        <section class="d-flex flex-column my-3">
            <h3>Tarefas</h3>
            <ul class="list-group">
                @forelse($tasks as $task)
                <li class="list-group-item d-flex justify-content-between">
                    <span style="font-size: 16px;">{{ $task->title }}</span>
                    <div class="d-flex gap-2">
                        <abbr title="Concluir Tarefa">
                            <a href="{{ route('task.complete',$task->id)}}"><i class="btn bi bi-check-circle-fill btn-sm"></i></a>
                        </abbr>
                        <abbr title="Editar Tarefa">
                            <a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm"><i class="bi bi-pencil-square" style="color:white !important;"></i></a>
                        </abbr>
                        <form action="{{ route('task.destroy',$task->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <abbr title="Deletar Tarefa">
                                <button class="btn btn-sm"><i style="color:white !important;" class="bi bi-trash3-fill"></i></button>
                            </abbr>
                        </form>
                    </div>
                </li>
                @empty
                <div class="alert alert-info text-center">Você não possui tarefas cadastradas</div>
                @endforelse
            </ul>
        </section>
        <hr />
        <section class="d-flex flex-column my-3">
            <h3>Tarefas concluidas</h3>
            <ul class="list-group">
                @forelse($tasksCompleted as $task)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $task->title }}</span>
                        <div>
                            <abbr title="Remover Tarefa Concluida">
                                <a class="btn btn-sm" href="{{ route('task.complete',$task->id) }}"><i class="bi bi-x-circle" style="color: white !important;"></i></a>
                            </abbr>
                        </div>

                    </li>
                @empty
                    <div class="alert alert-info text-center">Você ainda não completou nenhuma tarefa</div>
                @endforelse
            </ul>
        </section>
    </div>

</x-layout>
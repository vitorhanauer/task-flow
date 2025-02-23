<x-layout>
    <div class="container">
        <section class="d-flex flex-column my-3">
            <h3>Tarefas</h3>
            <ul class="list-group">
                @forelse($tasks as $task)
                <li class="list-group-item d-flex justify-content-between">
                    <span style="font-size: 16px;">{{ $task->title }}</span>
                    <div class="d-flex gap-2">
                        <a href="{{ route('task.complete',$task->id)}}"><i class="btn bi bi-check-circle-fill btn-sm"></i></a>
                        <a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm"><i class="bi bi-pencil-square" style="color:white !important;"></i></a>
                        <form action="{{ route('task.destroy',$task->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm"><i style="color:white !important;" class="bi bi-trash3-fill"></i></button>
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
                @forelse($tasksUncompleted as $task)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $task->title }}</span>
                        <div>
                            <a class="btn btn-sm" href="{{ route('task.complete',$task->id) }}"><i class="bi bi-x-circle" style="color: white !important;"></i></a>
                        </div>

                    </li>
                @empty
                    <div class="alert alert-info text-center">Você ainda não completou nenhuma tarefa</div>
                @endforelse
            </ul>
        </section>
    </div>

</x-layout>
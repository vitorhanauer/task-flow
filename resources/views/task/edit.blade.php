<x-layout>

    <div class="container my-4">
        <form action="{{ route('task.update',$task->id) }}" class="form-group" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="status" value="0">
            <input type="hidden" name="users_id" value="1">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="title" class="form-label">Nome</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 col-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn">Atualizar Tarefa</button>
                    <a href="{{ route('task.index') }}" class="btn">Voltar</a>
                </div>
            </div>

        </form>
    </div>

</x-layout>
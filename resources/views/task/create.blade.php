<x-layout>

    <div class="container my-4">
        <form action="{{ route('task.store') }}" class="form-group" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="title" class="form-label">Nome</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 col-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn">Criar Tarefa</button>
                    <a href="{{ route('task.index') }}" class="btn">Voltar</a>
                </div>
            </div>

        </form>
    </div>

</x-layout>
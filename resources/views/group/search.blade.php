@extends('components.layout')

@section('content')
    <div class="container my-4">
        <form class="mb-3" action="{{ route('group.search',$group) }}">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="name">Pesquise um usuário para adicionar ao grupo</label>
                    <input class="form-control" type="text" name='name' id="name" placeholder="Digite um nome">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn">Pesquisar</button>
                </div>
            </div>
        </form>

        <section>
            <ul class="list-group">
                <h2>Usuários - Grupo: {{$group->name}}</h2>
                @forelse ($users as $userAll)
                <form action="{{ route('group.addUser',[$userAll->id,$group->id]) }}" method="post">
                    @csrf
                    @method('patch')
                        <li class="list-group-item d-flex justify-content-between">
                            <div>{{ ucwords($userAll->name)}}</div>
                            <abbr title="Adicionar ao grupo">
                                <button class="btn btn-sm"><i class="bi bi-person-fill-add" style='color:white !important'></i></button>
                            </abbr>
                        </li>
                    </form>
                @empty
                    <div class="alert alert-info text-center">Nenhum Usuário Encontrado</div>
                @endforelse
                </ul>
        </section>
    </div>
@endsection
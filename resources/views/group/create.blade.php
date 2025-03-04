@extends('components.layout')

@section('content')
    <div class="container">
        <h2 class="mb-3">Criar grupo</h2>
        <form action="{{route('group.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome do grupo</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button class="btn">Criar grupo</button>
        </form>
    </div>
@endsection
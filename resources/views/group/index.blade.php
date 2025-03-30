@extends('components.layout')

@section('content')
    <div class="container">
        <h2>Meus Grupos</h2>
        <ul class="list-group">
            @forelse ($user->groups as $group) 
                <li class="list-group-item">
                    <a href="{{route('group.show',$group->id)}}">{{$group->name}}</a>
                </li>
            @empty
            <div class="alert alert-info">
                Você não possui nenhum grupo
            </div>
            @endif
        </ul>
    </div>
@endsection
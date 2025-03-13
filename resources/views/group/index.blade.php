@extends('components.layout')

@section('content')
    <div class="container">
        <h2>Meus Grupos</h2>
        @if(isset($user->groups))    
        <ul class="list-group">
            @foreach ($user->groups as $group) 
                <li class="list-group-item">
                    <a href="{{route('group.show',$group->id)}}">{{$group->name}}</a>
                </li>
            @endforeach
        </ul>
        @else
        <div class="alert alert-info">
            Você não possui nenhum grupo
        </div>
        @endif
    </div>
@endsection
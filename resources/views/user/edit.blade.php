@extends('components.layout')

@section('content')
<div class="container mt-4">
    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="d-flex mb-3">
            <div class="d-flex flex-column gap-2 me-2">
                <div class="rounded-0">
                    @if(!empty($user->image_path))
                        <img src="{{ asset('storage/'.$user->image_path)}}" style="width:350;height:350px;">
                    @else
                        <div class="btn rounded-0" style="width:350px;height:350px;font-size:196px">{{ $user->name[0] }}</div>
                    @endif
                </div>
                <input class="form-control" type="file" id="image" name="image" style="width: 350px">
            </div>
            <div style="width: 500px;">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label fs-4">Nome</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="email" class="form-label fs-4">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="password" class="form-label fs-4">Senha</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn rounded-0 btn-lg">Atualizar</button>
        </div>
    </form>
</div>
@endsection
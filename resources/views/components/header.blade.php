<nav class="navbar navbar-expand-lg bg-body-tertiary header-navbar ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('login') }}">Task Flow</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between me-5" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('task.index') }}">Tarefas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('task.create') }}">Criar Tarefa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}">Sair</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a href="{{ route('admin.register') }}" class="nav-link">Criar Conta</a>
                </li>
                @endguest
            </ul>
            @auth    
            <div>
                <a href="{{ route('user.edit') }}">
                    @if(!empty($user->image_path))
                        <img src="{{ asset('storage/'.$user->image_path)}}" style="width:50px;height:50px;border-radius:25px">
                    @else
                        <span class="btn" style="width:50px;height:50px;border-radius:25px;font-size:25px">{{ $user->name[0] }}</span>
                    @endif
                </a>
            </div>
            @endauth
        </div>

    </div>
</nav>
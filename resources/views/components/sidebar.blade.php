<div class="sidebar d-flex justify-content-between">
    <div>
        <h1 class="sidebar-brand"><a href="{{ route('login') }}">Task Flow</a></h1>
        <ul class="sidebar-nav">
            @auth
            <span>
                @if(!empty($user->image_path))
                    <img src="{{ asset('storage/'.$user->image_path)}}" class="icon-image">
                @else
                    <p class="icon-without-image">{{ strtoupper($user->name[0]) }}</p>
                @endif
            </span>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('task.index') }}">Minhas Tarefas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('task.create') }}">Criar Tarefa</a>
            </li>
            <li class="nav-item">
                <a class="dropdown-item" href="{{ route('user.edit') }}">Editar perfil</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('group.create') }}" class="dropdown-item">Criar Grupo</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('group.index') }}" class="dropdown-item">Ver Grupos</a>
            </li>
            <li class="nav-item">
                <a type="button" data-bs-toggle="modal" data-bs-target="#exitModal" style="color:red!important;">
                    Sair
                </a>
                
                <div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exitModalLabel">Deseja Sair?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer gap-2">
                            <a type="button" style="text-decoration: none" data-bs-dismiss="modal">Cancelar</a>
                            <a class="nav-link" href="{{ route('admin.logout') }}" style="color:red!important;">Sair</a>
                        </div>
                    </div>
                    </div>
                </div>
    
            </li>
            @endauth
        </ul>
    </div>
    <div style="text-align: center">
        Task Flow 1.5.0
    </div>
</div>
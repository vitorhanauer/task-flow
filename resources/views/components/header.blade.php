<nav class="navbar navbar-expand-lg bg-body-tertiary header-navbar ">
    <div class="container-fluid">
    <h1 class="navbar-brand"><a href="{{ route('login') }}">Task Flow</a></h1>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between me-5" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a href="{{ route('admin.register') }}" class="nav-link">Criar Conta</a>
                </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>
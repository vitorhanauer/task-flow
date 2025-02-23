<x-layout>

    <div class="login-form container">

        <form action="{{ route('admin.store') }}" method="post">
            @csrf
            <div class="col-12 mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="col-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="col-12 mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" class="btn rounded-0">Criar Conta</button>

        </form>

    </div>

</x-layout>
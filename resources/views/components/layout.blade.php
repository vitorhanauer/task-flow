<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Flow</title>
    @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        @guest
            @include('components.header')
        @endguest
    </header>
    <main class="d-flex">
        @auth
            @include('components.sidebar')
        @endauth
        <section class="d-flex flex-column py-5" style="width: 100%">
            @include('components.erros')
            @yield('content')
        </section>
    </main>
</body>
</html>
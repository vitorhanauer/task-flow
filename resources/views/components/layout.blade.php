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
        @include('components.header')
        @include('components.erros')
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
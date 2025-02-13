<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Inicial')</title>
    <!-- Link para o arquivo de estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Estilos adicionais (se houver) -->
    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

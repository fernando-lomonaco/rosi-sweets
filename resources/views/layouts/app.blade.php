<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cadastro e gerenciamento de bolos e doces">
    <meta name="keywords" content="bolos, doces, confeitaria, cadastro, Laravel">
    <title>@yield('title') - Bolos e Doces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="{{ url('/') }}">Bolos & Doces</a>
    </nav>
    <main class="container mt-4">
        @yield('content')
    </main>
</body>
</html>

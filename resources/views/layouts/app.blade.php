<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
        }
        .navbar {
            background-color: #007bff; /* Cor de fundo sólida da navbar */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra para a navbar */
        }
        .navbar-brand {
            font-weight: bold; /* Texto em negrito */
            color: white; /* Cor do texto da marca */
        }
        .nav-link {
            color: white; /* Cor do texto dos links */
            padding: 10px 15px; /* Espaçamento interno */
            border-radius: 5px; /* Bordas arredondadas */
            margin: 5px; /* Margem entre os itens */
            transition: background-color 0.3s; /* Transição suave ao passar o mouse */
        }
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Cor ao passar o mouse */
        }
        .nav-link.active {
            background-color: #0056b3; /* Cor de fundo para o link ativo */
            font-weight: bold; /* Negrito para o link ativo */
        }
        .logout-button {
            background-color: #dc3545; /* Cor de fundo mais viva para o botão Sair */
            color: white; /* Cor do texto do botão Sair */
            padding: 10px 15px; /* Espaçamento interno */
            border-radius: 5px; /* Bordas arredondadas */
            margin: 5px; /* Margem entre os itens */
            transition: background-color 0.3s; /* Transição suave ao passar o mouse */
            border: none; /* Remove borda padrão */
        }
        .logout-button:hover {
            background-color: #c82333; /* Cor ao passar o mouse sobre o botão Sair */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Catálogo de Produtos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"> <!-- Classe me-auto adicionada para alinhar os itens à esquerda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a>
                    </li>
                </ul>
                <ul class="navbar-nav"> <!-- Nova lista para alinhar o botão Sair à direita -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout-button">Sair</button> <!-- Classe para o botão Sair -->
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Catálogo de Produtos</title>
    <style>
        body {
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            text-align: center;
        }

        .navbar a {
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            margin: 0 10px;
            display: inline-block;
        }

        .navbar a.selected {
            background-color: #007BFF;
            border-radius: 4px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
        }

        h1, h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        .highlight-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .feature {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
        }

        .feature i {
            font-size: 48px;
            color: #007BFF;
            margin-bottom: 10px;
        }

        .cta {
            margin-top: 20px;
        }

        .cta .button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 5px;
        }

        .cta .button:hover {
            background-color: #0056b3;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
        }

        .modal-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .modal-close:hover,
        .modal-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .close-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .close-button:hover {
            background-color: #0056b3;
        }

        .container.mt-5 {
            display: none;
        }
    </style>
</head>
<body>
    @include('layouts.app')

    <div class="container">
        <div class="highlight-box">
            <h1>Bem-vindo ao Catálogo de Produtos</h1>
            <p>Gerencie facilmente seu catálogo de produtos e suas categorias.</p>
        </div>

        <div class="features">
            <div class="feature">
                <i class="fas fa-box"></i>
                <h2>Cadastro de Produto</h2>
                <p>Adicione novos produtos ao seu catálogo com facilidade.</p>
            </div>
            <div class="feature">
                <i class="fas fa-list"></i>
                <h2>Listar Produtos</h2>
                <p>Visualize todos os produtos cadastrados no sistema.</p>
            </div>
            <div class="feature">
                <i class="fas fa-tags"></i>
                <h2>Criar Categoria</h2>
                <p>Adicione novas categorias para organizar seus produtos.</p>
            </div>
            <div class="feature">
                <i class="fas fa-th-list"></i>
                <h2>Listar Categorias</h2>
                <p>Visualize todas as categorias cadastradas no sistema.</p>
            </div>
        </div>

        <div class="cta">
            <a href="{{ route('products.create') }}" class="button">Criar Produto</a>
            <a href="{{ route('products.index') }}" class="button">Listar Produtos</a>
            <a href="{{ route('categories.create') }}" class="button">Criar Categoria</a>
            <a href="{{ route('categories.index') }}" class="button">Listar Categorias</a>
        </div>
    </div>
</body>
</html>

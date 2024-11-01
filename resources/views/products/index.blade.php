@extends('layouts.app')

@section('content')
<h1>Lista de Produtos</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary">Criar Novo Produto</a>
<a href="{{ route('products.import') }}" class="btn btn-success">Importar Produtos da API</a>
<br>

<style>
    .alert.alert-success {
        margin-top: 10px;
    }
    .product-image {
        max-width: 100px; /* Limita a largura da imagem */
        max-height: 100px; /* Limita a altura da imagem */
    }
    .placeholder-image {
        width: 100px;
        height: 100px;
        background-color: #f0f0f0; /* Cor de fundo para a imagem de placeholder */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        color: #888;
        border: 1px solid #ccc;
    }
    .action-button {
        display: block; /* Exibe cada botão em uma nova linha */
        margin-top: 5px; /* Adiciona um pequeno espaço entre os botões */
    }
</style>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($product->image_url && filter_var($product->image_url, FILTER_VALIDATE_URL))
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <div class="placeholder-image">Sem Imagem</div>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning action-button">Editar</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger action-button">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

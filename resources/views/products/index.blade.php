@extends('layouts.app')

@section('content')
<h1>Lista de Produtos</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary">Criar Novo Produto</a>
<a href="{{ route('products.import') }}" class="btn btn-success">Importar Produtos da API</a>
<br>

<!-- Formulário de busca -->
<form action="{{ route('products.index') }}" method="GET" class="mt-3 mb-3">
    <div class="row align-items-end">
        <div class="col-md-2">
            <input type="text" name="id" class="form-control" placeholder="Buscar por ID" value="{{ request('id') }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" placeholder="Buscar por Nome" value="{{ request('name') }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="category" class="form-control" placeholder="Buscar por Categoria" value="{{ request('category') }}">
        </div>
        <div class="col-md-2">
            <select name="has_image" class="form-control">
                <option value="">Selecionar Imagem</option>
                <option value="1" {{ request('has_image') == '1' ? 'selected' : '' }}>Com Imagem</option>
                <option value="0" {{ request('has_image') == '0' ? 'selected' : '' }}>Sem Imagem</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </div>
</form>

<style>
    .alert.alert-success {
        margin-top: 10px;
    }
    .product-image {
        max-width: 100px;
        max-height: 100px;
    }
    .placeholder-image {
        width: 100px;
        height: 100px;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        color: #888;
        border: 1px solid #ccc;
    }
    .action-button {
        display: block;
        margin-top: 5px;
        width: 100%; /* Botões cobrem todo o espaço disponível */
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

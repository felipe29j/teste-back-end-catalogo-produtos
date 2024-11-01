@extends('layouts.app')

@section('content')
<h1>{{ isset($product) ? 'Editar Produto' : 'Criar Produto' }}</h1>

<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Nome do Produto</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description" class="form-control" required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="image_url">URL da Imagem (opcional)</label>
        <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $product->image_url ?? '') }}">
    </div>
    <br>

    <button type="submit" class="btn btn-success">{{ isset($product) ? 'Atualizar' : 'Criar' }}</button>
</form>
@endsection

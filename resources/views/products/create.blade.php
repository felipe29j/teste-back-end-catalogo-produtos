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
        @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="price">Preço</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
        @if($errors->has('price'))
            <span class="text-danger">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description" class="form-control" required>{{ old('description', $product->description ?? '') }}</textarea>
        @if($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('category_id'))
            <span class="text-danger">{{ $errors->first('category_id') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="image_url">URL da Imagem (opcional)</label>
        <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $product->image_url ?? '') }}">
        @if($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
        @endif
    </div>
    <br>

    <button type="submit" class="btn btn-success">{{ isset($product) ? 'Atualizar' : 'Criar' }}</button>
</form>
@endsection

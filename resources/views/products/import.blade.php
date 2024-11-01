@extends('layouts.app')

@section('content')
<h1>Importar Produtos da API Externa</h1>

<form action="{{ route('products.import') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="product_id">ID do Produto (opcional)</label>
        <input type="number" name="product_id" class="form-control" placeholder="Deixe em branco para importar todos os produtos">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Importar</button>
</form>
@endsection

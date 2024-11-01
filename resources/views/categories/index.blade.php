@extends('layouts.app')

@section('content')
<h1>Lista de Categorias</h1>
<style>
    .alert.alert-danger {
    margin-top: 10px;
}
</style>
<a href="{{ route('categories.create') }}" class="btn btn-primary">Criar Nova Categoria</a>
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

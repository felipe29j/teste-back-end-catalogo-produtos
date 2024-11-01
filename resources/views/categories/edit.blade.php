@extends('layouts.app')

@section('content')
<h1>{{ isset($category) ? 'Editar Categoria' : 'Criar Categoria' }}</h1>

<form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
    @csrf
    @if(isset($category))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Nome da Categoria</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
    </div>
    <br>

    <button type="submit" class="btn btn-success">{{ isset($category) ? 'Atualizar' : 'Criar' }}</button>
</form>
@endsection

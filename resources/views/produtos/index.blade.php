@extends('layouts.app')
@section('title', 'Lista de Produtos')
@section('content')
    <h1 class="mb-4">Produtos Cadastrados</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')
@section('title', 'Lista de Produtos')
@section('content')
<style>
    .top-bar {
        display: flex;
        align-items: center;
        background-color: #fff3e0;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .top-bar h5 {
        margin: 0;
        font-weight: 600;
        color: #ff6f00;
    }

    .produto-card {
        min-width: 250px;
        max-width: 300px;
        margin-right: 15px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .scroll-container {
        display: flex;
        overflow-x: auto;
        padding-bottom: 1rem;
    }

    .scroll-container::-webkit-scrollbar {
        height: 8px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
        background-color: #ff9800;
        border-radius: 4px;
    }

    .btn-rosi {
        background-color: #ff9800;
        color: white;
        border: none;
    }

    .btn-rosi:hover {
        background-color: #fb8c00;
    }

    .footer {
        margin-top: 3rem;
        text-align: center;
        font-weight: bold;
        color: #ff6f00;
        background-color: #fff8f0;
        padding: 1rem;
        border-top: 1px solid #ffe0b2;
        border-radius: 12px;
    }
</style>

<div class="top-bar">
    <h5>Olá, Rosi 🍰</h5>
</div>

<h2 class="mb-4">Produtos Cadastrados</h2>
<a href="{{ route('produtos.create') }}" class="btn btn-rosi mb-4">+ Novo Produto</a>

<div class="scroll-container">
    @foreach ($produtos as $produto)
        <div class="card produto-card">
            <img class="imagem-produto" alt="Imagem de {{ $produto->nome }}">
            <div class="card-body">
                <h5 class="card-title">{{ $produto->nome }}</h5>
                <p class="card-text">{{ $produto->categoria }}</p>
                <p class="card-text text-muted">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-primary">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imagens = document.querySelectorAll('.imagem-produto');

        imagens.forEach(img => {
            const randomId = Math.floor(Math.random() * 1000);
            img.src = `https://picsum.photos/300/200?random=${randomId}`;
        });
    });
</script>
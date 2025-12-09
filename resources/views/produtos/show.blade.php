@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
    <a href="{{ route('produtos.index') }}" class="back-link">← Voltar para lista</a>

    <h2 style="color: #2d3748; font-size: 2em; margin-bottom: 30px;">👁️ Detalhes do Produto</h2>

    <div class="detail-card">
        <h3>ID</h3>
        <p>{{ $produto->id }}</p>
    </div>

    <div class="detail-card">
        <h3>Nome</h3>
        <p>{{ $produto->nome }}</p>
    </div>

    <div class="detail-card">
        <h3>Descrição</h3>
        <p>{{ $produto->descricao ?? 'Sem descrição' }}</p>
    </div>

    <div class="detail-card">
        <h3>Preço</h3>
        <p style="font-size: 1.5em; font-weight: bold; color: #48bb78;">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
    </div>

    <div class="detail-card">
        <h3>Quantidade em Estoque</h3>
        <p style="font-size: 1.3em; font-weight: bold;">{{ $produto->quantidade }} unidades</p>
    </div>

    <div class="detail-card">
        <h3>Cadastrado em</h3>
        <p>{{ $produto->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="detail-card">
        <h3>Última Atualização</h3>
        <p>{{ $produto->updated_at->format('d/m/Y H:i') }}</p>
    </div>

    <div style="display: flex; gap: 10px; margin-top: 30px;">
        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning">✏️ Editar</a>
        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">🗑️ Excluir</button>
        </form>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">← Voltar</a>
    </div>
@endsection